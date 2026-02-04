<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportHandling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportHandlingController extends Controller
{
    /**
     * Display the handling history (timeline) for a report.
     */
    public function index(Report $report)
    {
        // Load handlings with admin info
        $handlings = $report->handlings()->with('admin')->get();

        // If requested via AJAX/API, return JSON
        if (request()->wantsJson()) {
            return response()->json($handlings);
        }

        // Otherwise, could return a view or redirect back with data
        // specific implementations might vary, but for now we'll assumes it's partial or JSON usage
        // Or if we need a dedicated page:
        // return view('admin.reports.timeline', compact('report', 'handlings'));
        
        return response()->json([
            'report' => $report,
            'handlings' => $handlings
        ]);
    }

    /**
     * Add a new handling record (business process step).
     */
    public function store(Request $request, Report $report)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:50',
            'note' => 'nullable|string|max:1000',
        ]);

        // Create handling record
        $handling = ReportHandling::create([
            'report_id' => $report->id,
            'admin_id' => Auth::id(),
            'status' => $validated['status'],
            'note' => $validated['note'] ?? null,
        ]);

        // Update the main report status to match the latest handling
        // This ensures the report status reflects the current workflow state
        if ($report->status !== $validated['status']) {
            $report->update(['status' => $validated['status']]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Report handling recorded successfully',
                'data' => $handling
            ], 201);
        }

        // Send Email Notification to User (if report is not anonymous and user has email)
        try {
            $user = $report->user;
            if ($user && $user->email) {
                \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\ReportHandlingNotification($report, $handling));
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Gagal mengirim email notifikasi update laporan: ' . $e->getMessage());
        }

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
