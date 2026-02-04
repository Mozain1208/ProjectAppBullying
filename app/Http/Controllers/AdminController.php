<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\Consultation;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->isAdmin()) {
                return redirect()->route('dashboard')->withErrors(['error' => 'Akses ditolak. Halaman ini khusus admin.']);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $stats = [
            'total_reports' => Report::count(),
            'pending_reports' => Report::where('status', 'pending')->count(),
            'total_users' => User::where('role', 'user')->count(),
            'total_consultations' => Consultation::count(),
        ];

        $recent_reports = Report::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $recent_consultations = Consultation::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get counts for each bullying type for the chart
        $bullying_types_stats = Report::select('bullying_type', DB::raw('count(*) as total'))
            ->groupBy('bullying_type')
            ->pluck('total', 'bullying_type')
            ->toArray();

        // Get actual categories from settings to ensure they all show up in the chart
        $settings = \App\Models\SiteSetting::all()->pluck('setting_value', 'setting_key');
        $rawCategories = explode(',', $settings['bullying_categories'] ?? 'verbal,fisik,sosial,cyberbullying');
        $common_types = array_map(function($cat) {
            return strtolower(trim($cat));
        }, $rawCategories);

        foreach ($common_types as $type) {
            if (!isset($bullying_types_stats[$type])) {
                $bullying_types_stats[$type] = 0;
            }
        }

        // Get counts for monthly trend
        $currentYear = date('Y');
        if (config('database.default') === 'sqlite') {
            $monthly_stats = Report::select(
                DB::raw('strftime("%m", created_at) as month'),
                DB::raw('count(*) as total')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();
        } else {
            $monthly_stats = Report::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('count(*) as total')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();
        }

        $trend_data = [];
        for ($i = 1; $i <= 12; $i++) {
            $m = str_pad($i, 2, '0', STR_PAD_LEFT);
            // Handle both string '01' and integer 1 keys
            $trend_data[] = $monthly_stats[$m] ?? ($monthly_stats[$i] ?? 0);
        }

        return view('admin.dashboard', compact('stats', 'recent_reports', 'recent_consultations', 'bullying_types_stats', 'trend_data'));
    }

    public function reports()
    {
        $reports = Report::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.reports', compact('reports'));
    }

    public function updateReportStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,process,resolved'
        ]);

        $report->update(['status' => $request->status]);

        AuditLog::log('Update Status Laporan', ['report_id' => $report->id, 'new_status' => $request->status]);

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }

    public function showReport($id)
    {
        $report = Report::with(['user', 'evidences', 'messages.user'])->findOrFail($id);
        return view('admin.report_show', compact('report'));
    }

    public function storeReportMessage(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        $request->validate([
            'message' => 'required|string'
        ]);

        $message = $report->messages()->create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        AuditLog::log('Pesan Laporan Baru', ['report_id' => $report->id, 'message_id' => $message->id]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }

    public function consultations()
    {
        $consultations = Consultation::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.consultations', compact('consultations'));
    }

    public function users(Request $request)
    {
        $query = User::where('role', 'user');

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        // Filter by Status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('account_status', $request->status);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.users', compact('users'));
    }

    public function showUser($id)
    {
        $user = User::with(['reports', 'consultations'])->findOrFail($id);
        $logs = AuditLog::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        
        return view('admin.user_show', compact('user', 'logs'));
    }

    public function auditLogs(Request $request)
    {
        $query = AuditLog::with(['user', 'performer']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('action', 'like', "%{$search}%")
                  ->orWhere('details', 'like', "%{$search}%")
                  ->orWhereHas('user', function($qu) use ($search) {
                      $qu->where('username', 'like', "%{$search}%");
                  })
                  ->orWhereHas('performer', function($qp) use ($search) {
                      $qp->where('username', 'like', "%{$search}%");
                  });
            });
        }

        $logs = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.audit_logs', compact('logs'));
    }

    public function settings()
    {
        $settings = \App\Models\SiteSetting::all()->pluck('setting_value', 'setting_key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $rules = [
            'school_name' => 'nullable|string|max:255',
            'password_policy' => 'nullable|in:standard,strong,very_strong',
            'min_password_length' => 'nullable|integer|min:6|max:32',
            'login_attempts_limit' => 'nullable|integer|min:3|max:10',
            'auto_logout_time' => 'nullable|integer|min:5|max:1440',
            'bullying_categories' => 'nullable|string',
            'report_verification_required' => 'nullable|in:on,off',
            'report_handling_deadline' => 'nullable|integer|min:1|max:30',
            'consultation_enabled' => 'nullable|in:on,off',
            'consultation_anonymous' => 'nullable|in:on,off',
            'counselor_hours_start' => 'nullable|string',
            'counselor_hours_end' => 'nullable|string',
            'consultation_notifications' => 'nullable|in:on,off',
            'notify_new_report' => 'nullable|in:on,off',
            'notify_new_consultation' => 'nullable|in:on,off',
            'notify_report_message' => 'nullable|in:on,off',
            'notify_consultation_message' => 'nullable|in:on,off',
            'access_role_admin' => 'nullable|string',
            'access_role_pelapor' => 'nullable|string',
        ];

        $request->validate($rules);

        // Filter and save all settings
        $settingsToSave = $request->except('_token');
        
        // Handle checkboxes that don't send value if unchecked
        $checkboxes = [
            'consultation_enabled', 
            'consultation_anonymous', 
            'consultation_notifications', 
            'report_verification_required',
            'notify_new_report',
            'notify_new_consultation',
            'notify_report_message',
            'notify_consultation_message'
        ];
        foreach ($checkboxes as $checkbox) {
            if (!$request->has($checkbox)) {
                $settingsToSave[$checkbox] = 'off';
            }
        }

        foreach ($settingsToSave as $key => $value) {
            \App\Models\SiteSetting::set($key, $value);
        }

        AuditLog::log('Update Pengaturan Sistem', ['updated_keys' => array_keys($settingsToSave)]);

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }

    public function updateUserAction(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $action = $request->action; // warning, temp_block, perm_block, restrict, restore
        
        $request->validate([
            'action' => 'required|in:warning,temp_block,perm_block,restrict,restore',
            'reason' => 'required|string|min:5',
            'duration' => 'required_if:action,temp_block|integer|min:1', // Days
        ]);

        $details = [];
        $logAction = '';

        switch ($action) {
            case 'warning':
                $user->increment('warning_count');
                $user->account_status = 'warning';
                $user->risk_level = 'medium';
                $logAction = 'Peringatan User';
                $details['warning_number'] = $user->warning_count;
                break;

            case 'temp_block':
                $user->account_status = 'temp_blocked';
                $user->banned_until = now()->addDays($request->duration);
                $user->status = 'banned'; // Legacy sync
                $user->risk_level = 'high';
                $logAction = 'Blokir Sementara';
                $details['duration_days'] = $request->duration;
                $details['banned_until'] = $user->banned_until->toDateTimeString();
                break;

            case 'perm_block':
                $user->account_status = 'perm_blocked';
                $user->banned_until = null;
                $user->status = 'banned'; // Legacy sync
                $user->risk_level = 'critical';
                $logAction = 'Blokir Permanen';
                break;

            case 'restrict':
                $user->risk_level = 'medium';
                $logAction = 'Pembatasan Fitur';
                break;

            case 'restore':
                $user->account_status = 'active';
                $user->status = 'active';
                $user->banned_until = null;
                $user->risk_level = 'low';
                $logAction = 'Pemulihan Akun';
                break;
        }

        $user->last_block_reason = $request->reason;
        $user->admin_notes = $request->admin_note ?? $user->admin_notes;
        $user->save();

        // Use helper log
        AuditLog::log($logAction, array_merge($details, ['reason' => $request->reason]), $user->id);

        return back()->with('success', 'Status pengguna berhasil diperbarui.');
    }
    public function deleteReport($id)
    {
        $report = Report::with('evidences')->findOrFail($id);
        
        // Delete evidence files
        foreach ($report->evidences as $evidence) {
            if (Storage::disk('public')->exists($evidence->file_path)) {
                Storage::disk('public')->delete($evidence->file_path);
            }
        }

        $reportId = $report->id;
        $report->delete();

        AuditLog::log('Hapus Laporan', ['report_id' => $reportId]);

        return redirect()->route('admin.reports')->with('success', 'Laporan berhasil dihapus secara permanen.');
    }
}
