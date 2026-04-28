<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        if (!$user) {
            return view('tenant.my-lease', ['lease' => null]);
        }
        
        $tenant = $user->tenant;
        
        if (!$tenant) {
            return view('tenant.my-lease', ['lease' => null]);
        }
        
        $lease = \App\Models\Lease::where('tenant_id', $tenant->id)
            ->where('status', 'active')
            ->with('unit.property')
            ->first();
        
        // Calculate days remaining and progress
        $daysLeft = 0;
        $progressPercent = 0;
        
        if ($lease) {
            $daysLeft = now()->diffInDays($lease->end_date, false);
            if ($daysLeft < 0) $daysLeft = 0;
            
            $totalDays = now()->diffInDays($lease->start_date) + $daysLeft;
            $progressPercent = $totalDays > 0 ? round((now()->diffInDays($lease->start_date) / $totalDays) * 100) : 0;
        }
        
        return view('tenant.my-lease', [
            'lease' => $lease,
            'daysLeft' => $daysLeft,
            'progressPercent' => $progressPercent
        ]);
    }
    
    public function request(Request $request, $unitId)
    {
        $user = Auth::user();
        $tenant = $user->tenant;
        
        if (!$tenant) {
            return back()->with('error', 'Tenant profile not found.');
        }
        
        $unit = \App\Models\Unit::findOrFail($unitId);
        
        // Check if unit is available
        if ($unit->status != 'available') {
            return back()->with('error', 'This unit is no longer available.');
        }
        
        // Check if tenant already has a lease for this unit
        $existingLease = \App\Models\Lease::where('unit_id', $unit->id)
            ->where('tenant_id', $tenant->id)
            ->whereIn('status', ['active', 'pending'])
            ->first();
            
        if ($existingLease) {
            return back()->with('error', 'You already have a lease for this unit.');
        }
        
        // Create the lease
        $lease = \App\Models\Lease::create([
            'unit_id' => $unit->id,
            'tenant_id' => $tenant->id,
            'start_date' => $request->move_in_date ?? now()->addDays(15),
            'end_date' => now()->addYear(),
            'monthly_rent' => $unit->monthly_rent,
            'security_deposit' => $unit->security_deposit ?? 0,
            'status' => 'active',
            'terms_conditions' => $request->notes ?? 'Rent request via website',
        ]);
        
        // Update unit status to occupied
        $unit->status = 'occupied';
        $unit->save();
        
        return redirect('/tenant/my-lease')->with('success', 'Lease created successfully!');
    }
}