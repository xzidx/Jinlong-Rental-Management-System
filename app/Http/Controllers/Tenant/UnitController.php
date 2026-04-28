<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;

class UnitController extends Controller
{
    // Show my unit (the unit the tenant is currently renting)
    public function myUnit()
    {
        $user = Auth::user();
        $tenant = $user->tenant;
        
        $unit = null;
        
        if ($tenant) {
            $lease = \App\Models\Lease::where('tenant_id', $tenant->id)
                ->where('status', 'active')
                ->first();
                
            if ($lease) {
                $unit = $lease->unit;
            }
        }
        
        return view('tenant.my-unit', [
            'unit' => $unit
        ]);
    }
    
    // Show available units (all units that are available to rent)
    public function available()
    {
        $units = Unit::where('status', 'available')
            ->with('property')
            ->get();
            
        return view('tenant.available-units', [
            'units' => $units
        ]);
    }
    
    // Show all units the tenant is currently renting (multiple units)
    public function myUnits()
    {
        $user = Auth::user();
        $tenant = $user->tenant;
        
        $leases = [];
        
        if ($tenant) {
            $leases = \App\Models\Lease::where('tenant_id', $tenant->id)
                ->where('status', 'active')
                ->with('unit.property')
                ->get();
        }
        
        return view('tenant.my-all-units', [
            'leases' => $leases
        ]);
    }
}