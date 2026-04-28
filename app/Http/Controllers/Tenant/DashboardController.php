<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Lease;
use App\Models\Payment;
use App\Models\MaintenanceRequest;

class DashboardController extends Controller
{
    public function index()
    {
        // Get user
        $user = Auth::user();
        
        // Get tenant
        $tenant = $user->tenant;
        
        // Initialize variables
        $unit = null;
        $lease = null;
        $nextPayment = null;
        $pendingCount = 0;
        $recentPayments = collect();
        $recentMaintenance = collect();
        $daysLeft = 0;
        
        if ($tenant) {
            $lease = Lease::where('tenant_id', $tenant->id)
                ->where('status', 'active')
                ->first();
                
            if ($lease) {
                $unit = $lease->unit;
                $daysLeft = now()->diffInDays($lease->end_date, false);
                if ($daysLeft < 0) $daysLeft = 0;
                
                $nextPayment = Payment::where('lease_id', $lease->id)
                    ->where('status', 'pending')
                    ->where('due_date', '>=', now())
                    ->first();
                
                $pendingCount = MaintenanceRequest::where('lease_id', $lease->id)
                    ->whereIn('status', ['pending', 'in_progress'])
                    ->count();
                
                $recentPayments = Payment::where('lease_id', $lease->id)
                    ->latest()
                    ->take(3)
                    ->get();
                
                $recentMaintenance = MaintenanceRequest::where('lease_id', $lease->id)
                    ->latest()
                    ->take(3)
                    ->get();
            }
        }
        
        // SEND ALL VARIABLES TO VIEW (INCLUDING $user)
        return view('tenant.dashboard', [
            'user' => $user,           // ← MUST HAVE THIS!
            'unit' => $unit,
            'lease' => $lease,
            'nextPayment' => $nextPayment,
            'pendingCount' => $pendingCount,
            'recentPayments' => $recentPayments,
            'recentMaintenance' => $recentMaintenance,
            'daysLeft' => $daysLeft,
        ]);
    }
}