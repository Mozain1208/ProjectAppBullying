<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Evidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show report form
     */
    public function create()
    {
        return view('report');
    }

    /**
     * Store a new report
     */
    public function store(Request $request)
    {
        $settings = \App\Models\SiteSetting::all()->pluck('setting_value', 'setting_key');
        $allowedTypes = explode(',', $settings['bullying_categories'] ?? 'verbal,fisik,sosial,emosional');
        $allowedTypes = array_map('trim', $allowedTypes);
        

        $request->validate([
            'reporter_name' => 'required_without:anonymous|nullable|string|max:255',
            'reporter_age' => 'nullable|numeric|between:1,99',
            'reporter_role' => 'required|in:korban,saksi',
            'description' => 'required|string',
            'bullying_type' => 'required', // Dynamic validation
            'location' => 'required|string|max:255',
            'incident_date' => 'required|date',
            'incident_time' => 'required',
            // Max 50MB per file (51200 KB)
            'evidence.*' => 'required|file|mimes:jpg,jpeg,png,jfif,mp4,mp3,pdf,wav,mkv,avi,mov,flac,aac|max:51200',
        ], [
            'reporter_name.required_without' => 'Nama wajib diisi kecuali Anda melapor secara anonim.',
            'incident_date.required' => 'Tanggal kejadian wajib diisi.',
            'incident_time.required' => 'Waktu kejadian wajib diisi.',
            'evidence.*.mimes' => 'Format file bukti hanya boleh: Gambar (JPG, PNG, JFIF), Video, Audio, atau PDF.',
            'evidence.*.max' => 'Ukuran file tidak boleh lebih dari 50MB per file.',
        ]);

        // Additional dynamic validation
        if (!in_array($request->bullying_type, $allowedTypes)) {
            return back()->withInput()->withErrors(['bullying_type' => 'Jenis bullying tidak valid.']);
        }

        // Check total file size (Max 200MB)
        if ($request->hasFile('evidence')) {
            $totalSize = 0;
            foreach ($request->file('evidence') as $file) {
                $totalSize += $file->getSize();
            }
            // 200MB in Bytes = 200 * 1024 * 1024 = 209715200
            if ($totalSize > 209715200) {
                return back()->withInput()->withErrors(['evidence' => 'Total ukuran semua file bukti tidak boleh lebih dari 200MB.']);
            }
        }

        // Combine date and time
        $incident_datetime = $request->incident_date . ' ' . $request->incident_time;

        // Create report within a transaction for reliability
        $report = \DB::transaction(function() use ($request, $incident_datetime) {
            $report = Report::create([
                'user_id' => Auth::id(),
                'reporter_name' => $request->has('anonymous') ? null : $request->reporter_name,
                'reporter_age' => $request->reporter_age,
                'reporter_role' => $request->reporter_role,
                'description' => $request->description,
                'bullying_type' => strtolower(trim($request->bullying_type)), // Ensure lowercase for DB constraint
                'location' => $request->location,
                'incident_time' => $incident_datetime,
                'anonymous' => $request->has('anonymous'),
                'status' => 'pending',
            ]);

            // Handle file uploads
            if ($request->hasFile('evidence')) {
                foreach ($request->file('evidence') as $file) {
                    $path = $file->store('evidence', 'public');
                    
                    Evidence::create([
                        'report_id' => $report->id,
                        'file_path' => $path,
                        'file_type' => $file->getClientMimeType(),
                        'file_size' => $file->getSize(),
                    ]);
                }
            }

            return $report;
        });

        // Audit Log for Report Creation
        \App\Models\AuditLog::log('Laporan Baru Dibuat', [
            'report_id' => $report->id,
            'bullying_type' => $report->bullying_type,
            'location' => $report->location,
            'is_anonymous' => $report->anonymous
        ], Auth::id());

        return back()->with('success', 'Laporan berhasil dikirim! Tim kami akan segera menindaklanjuti.');
    }

    /**
     * Show user's reports
     */
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())
            ->with(['evidences', 'messages'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reports.index', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::where('user_id', Auth::id())
            ->with(['evidences', 'messages.user'])
            ->findOrFail($id);

        return view('reports.show', compact('report'));
    }

    public function storeMessage(Request $request, $id)
    {
        $report = Report::where('user_id', Auth::id())->findOrFail($id);
        
        $request->validate([
            'message' => 'required|string'
        ]);

        $report->messages()->create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
