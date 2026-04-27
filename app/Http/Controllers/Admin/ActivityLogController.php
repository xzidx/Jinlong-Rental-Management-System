<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with('user');

        // Filter by action
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Search by user or details
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->whereHas('user', function($user) use ($request) {
                    $user->where('name', 'like', '%' . $request->search . '%');
                })->orWhere('action', 'like', '%' . $request->search . '%');
            });
        }

        $activities = $query->latest()->paginate(20);

        // Get unique actions for filter dropdown
        $actions = ActivityLog::distinct()->pluck('action');

        return view('admin.activity-logs', compact('activities', 'actions'));
    }

    public function export()
    {
        // Export logic here
        return back()->with('success', 'Export feature coming soon!');
    }
}
