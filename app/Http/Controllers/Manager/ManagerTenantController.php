<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Tenant;

class ManagerTenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with(['leases' => function($q) {
            $q->where('status', 'active');
        }, 'leases.unit'])->get();
        
        return view('manager.tenants', [
            'tenants' => $tenants
        ]);
    }
}