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
        // Get the logged-in user
        $user = Auth::user();
        
        // Get the tenant (assuming user has tenant_id)
        $tenant = $user->tenant;
        
        // If no tenant found, show empty dashboard
        if (!$tenant) {
            return view('tenant.dashboard', [
                'hasData' => false,
                'message' => 'No tenant profile found for this user.'
            ]);
        }
        
        // Get active lease for this tenant
        $lease = Lease::where('tenant_id', $tenant->id)
            ->where('status', 'active')
            ->first();
        
        // If no active lease
        if (!$lease) {
            return view('tenant.dashboard', [
                'hasData' => false,
                'message' => 'No active lease found.'
            ]);
        }
        
        // Get unit from lease
        $unit = $lease->unit;
        
        // ===== CARD 1: Monthly Rent =====
        $monthlyRent = $lease->monthly_rent ?? 0;
        
        // Last payment status
        $lastPayment = Payment::where('lease_id', $lease->id)
            ->latest()
            ->first();
        
        $lastPaymentStatus = $lastPayment->status ?? 'pending';
        $lastPaymentMonth = $lastPayment ? $lastPayment->created_at->format('F Y') : 'No payment';
        
        // ===== CARD 2: Lease Progress (Days Left) =====
        $daysLeft = now()->diffInDays($lease->end_date, false);
        if ($daysLeft < 0) $daysLeft = 0;
        
        // ===== CARD 3: Active Maintenance Requests =====
        $activeRequestsCount = MaintenanceRequest::where('lease_id', $lease->id)
            ->whereIn('status', ['pending', 'in_progress'])
            ->count();
        
        // ===== MAINTENANCE RECORDS TABLE =====
        $maintenanceRequests = MaintenanceRequest::where('lease_id', $lease->id)
            ->latest()
            ->take(5)
            ->get();
        
        // ===== UPCOMING PAYMENT =====
        $nextPayment = Payment::where('lease_id', $lease->id)
            ->where('status', 'pending')
            ->where('due_date', '>=', now())
            ->orderBy('due_date')
            ->first();
        
        $nextPaymentAmount = $nextPayment->amount ?? $monthlyRent;
        $nextDueDate = $nextPayment->due_date ?? $lease->end_date;
        $nextPaymentStatus = $nextPayment->status ?? 'pending';
        
        // ===== RECENT PAYMENTS =====
        $recentPayments = Payment::where('lease_id', $lease->id)
            ->latest()
            ->take(3)
            ->get();
        
        // ===== UNIT INFORMATION =====
        $unitNumber = $unit->unit_number ?? 'N/A';
        $buildingName = $unit && $unit->property ? $unit->property->name : 'N/A';
        $floorNumber = $unit->floor_number ?? 'N/A';
        $bedrooms = $unit->bedrooms ?? 'N/A';
        $bathrooms = $unit->bathrooms ?? 'N/A';
        
        return view('tenant.dashboard', compact(
            'monthlyRent',
            'lastPaymentStatus',
            'lastPaymentMonth',
            'daysLeft',
            'activeRequestsCount',
            'maintenanceRequests',
            'nextPaymentAmount',
            'nextDueDate',
            'nextPaymentStatus',
            'recentPayments',
            'unitNumber',
            'buildingName',
            'floorNumber',
            'bedrooms',
            'bathrooms',
            'lease',
            'tenant'
        ));
    }
}