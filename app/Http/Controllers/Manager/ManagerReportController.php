<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Unit;
use App\Models\MaintenanceRequest;
use App\Models\Lease;

class ManagerReportController extends Controller
{
    public function index()
    {
        // Revenue
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');
        $monthlyRevenue = Payment::where('status', 'paid')
            ->whereMonth('payment_date', now()->month)
            ->sum('amount');
        $pendingPayments = Payment::where('status', 'pending')->sum('amount');
        
        // Occupancy
        $totalUnits = Unit::count();
        $occupiedUnits = Unit::where('status', 'occupied')->count();
        $occupancyRate = $totalUnits > 0 ? round(($occupiedUnits / $totalUnits) * 100) : 0;
        
        // Maintenance
        $totalRequests = MaintenanceRequest::count();
        $pendingRequests = MaintenanceRequest::where('status', 'pending')->count();
        $inProgressRequests = MaintenanceRequest::where('status', 'in_progress')->count();
        $completedRequests = MaintenanceRequest::where('status', 'completed')->count();
        
        // Leases
        $activeLeases = Lease::where('status', 'active')->count();
        $expiredLeases = Lease::where('status', 'expired')->count();
        $expiringSoon = Lease::where('status', 'active')
            ->whereBetween('end_date', [now(), now()->addDays(30)])
            ->count();
        
        // Recent Payments
        $recentPayments = Payment::with('lease.tenant', 'lease.unit')
            ->latest()
            ->take(10)
            ->get();
        
        return view('manager.reports', [
            'totalRevenue' => $totalRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'pendingPayments' => $pendingPayments,
            'totalUnits' => $totalUnits,
            'occupiedUnits' => $occupiedUnits,
            'occupancyRate' => $occupancyRate,
            'totalRequests' => $totalRequests,
            'pendingRequests' => $pendingRequests,
            'inProgressRequests' => $inProgressRequests,
            'completedRequests' => $completedRequests,
            'activeLeases' => $activeLeases,
            'expiredLeases' => $expiredLeases,
            'expiringSoon' => $expiringSoon,
            'recentPayments' => $recentPayments,
        ]);
    }
}