<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show consultation page
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.consultations');
        }

        if (\App\Models\SiteSetting::get('consultation_enabled', 'on') !== 'on') {
            return redirect()->route('dashboard')->withErrors(['error' => 'Fitur konsultasi sedang dinonaktifkan oleh admin.']);
        }
        
        // Users see their own consultations
        $consultations = Consultation::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('consultation', compact('consultations'));
    }

    public function show($id)
    {
        $consultation = Consultation::with(['replies.user', 'user'])->findOrFail($id);
        
        // Authorization Check
        if (!Auth::user()->isAdmin() && $consultation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('consultation_chat', compact('consultation'));
    }

    public function store(Request $request)
    {
        if (\App\Models\SiteSetting::get('consultation_enabled', 'on') !== 'on') {
            abort(403, 'Fitur dinonaktifkan.');
        }

        $request->validate([
            'message' => 'required|string',
        ]);

        $consultation = Consultation::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'anonymous' => $request->has('anonymous'),
        ]);

        \App\Models\AuditLog::log('Konsultasi Baru', [
            'consultation_id' => $consultation->id,
            'is_anonymous' => $consultation->anonymous
        ], Auth::id());

        return redirect()->route('consultation.show', $consultation->id)->with('success', 'Konsultasi dimulai!');
    }

    public function reply(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);

        if (!Auth::user()->isAdmin() && $consultation->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'message' => 'required|string',
        ]);

        $reply = $consultation->replies()->create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        \App\Models\AuditLog::log('Balasan Konsultasi', [
            'consultation_id' => $consultation->id,
            'reply_id' => $reply->id
        ], Auth::id());

        return back();
    }
}
