<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Lease;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();
        $totalUnits = Unit::count();
        $totalTenants = Tenant::count();
        $activeLeases = Lease::where('status', 'active')->count();
        
        return view('manager.dashboard', [
            'totalProperties' => $totalProperties,
            'totalUnits' => $totalUnits,
            'totalTenants' => $totalTenants,
            'activeLeases' => $activeLeases,
        ]);
    }
}