<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Lease;
use App\Models\Payment;
use App\Models\MaintenanceRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalProperties = Property::count();
        $totalUnits = Unit::count();
        $totalTenants = Tenant::count();
        $totalUsers = User::count();
        
        // Occupancy Rate
        $occupiedUnits = Unit::where('status', 'occupied')->count();
        $occupancyRate = $totalUnits > 0 ? round(($occupiedUnits / $totalUnits) * 100) : 0;
        
        // Monthly Revenue
        $monthlyRevenue = Payment::whereMonth('payment_date', now()->month)
            ->where('status', 'paid')
            ->sum('amount');
        
        // Pending Maintenance
        $pendingMaintenance = MaintenanceRequest::where('status', 'pending')->count();
        $urgentMaintenance = MaintenanceRequest::where('priority', 'emergency')
            ->whereIn('status', ['pending', 'in_progress'])
            ->count();
        
        // Recent Payments (last 5) - Fixed with null check
        $recentPayments = Payment::with(['lease.tenant', 'lease.unit'])
            ->latest()
            ->take(5)
            ->get();
        
        // Recent Maintenance (last 5)
        $recentMaintenance = MaintenanceRequest::with(['unit', 'lease.tenant'])
            ->latest()
            ->take(5)
            ->get();
        
        // Expiring Leases (next 30 days)
        $expiringLeases = Lease::with(['tenant', 'unit'])
            ->where('status', 'active')
            ->whereBetween('end_date', [now(), now()->addDays(30)])
            ->get();
        
        // Revenue Chart Data (last 6 months)
        $revenueLabels = [];
        $revenueData = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $revenueLabels[] = $month->format('M');
            $revenueData[] = Payment::whereMonth('payment_date', $month->month)
                ->whereYear('payment_date', $month->year)
                ->where('status', 'paid')
                ->sum('amount');
        }
        
        // New this month
        $newProperties = Property::whereMonth('created_at', now()->month)->count();
        $newTenants = Tenant::whereMonth('created_at', now()->month)->count();
        
        // Recent Activities
        $recentActivities = collect([]);
        
        return view('admin.dashboard', compact(
            'totalProperties', 'totalUnits', 'totalTenants', 'totalUsers',
            'occupancyRate', 'monthlyRevenue', 'pendingMaintenance', 'urgentMaintenance',
            'recentPayments', 'recentMaintenance', 'expiringLeases',
            'revenueLabels', 'revenueData', 'newProperties', 'newTenants', 'recentActivities'
        ));
    }
}
