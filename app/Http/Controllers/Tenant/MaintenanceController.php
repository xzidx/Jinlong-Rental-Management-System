<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tenant = $user->tenant;
        
        $requests = [];
        
        if ($tenant) {
            $lease = \App\Models\Lease::where('tenant_id', $tenant->id)
                ->where('status', 'active')
                ->first();
                
            if ($lease) {
                $requests = \App\Models\MaintenanceRequest::where('lease_id', $lease->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            }
        }
        
        return view('tenant.my-maintenance', [
            'requests' => $requests
        ]);
    }
    
    public function create()
    {
        return view('tenant.maintenance-create');
    }
    
    public function store(Request $request)
    {
        $user = Auth::user();
        $tenant = $user->tenant;
        
        if (!$tenant) {
            return back()->with('error', 'Tenant not found.');
        }
        
        $lease = \App\Models\Lease::where('tenant_id', $tenant->id)
            ->where('status', 'active')
            ->first();
            
        if (!$lease) {
            return back()->with('error', 'No active lease found.');
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high,emergency',
        ]);
        
        \App\Models\MaintenanceRequest::create([
            'lease_id' => $lease->id,
            'unit_id' => $lease->unit_id,
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'pending',
            'requested_date' => now(),
        ]);
        
        return redirect('/tenant/my-maintenance')->with('success', 'Maintenance request submitted!');
    }
}