<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Lease;
use App\Models\Unit;

class LeaseRequestController extends Controller
{
    public function index()
    {
        $pendingRequests = Lease::where('status', 'pending')
            ->with('tenant', 'unit')
            ->get();
        
        return view('manager.requests', [
            'pendingRequests' => $pendingRequests
        ]);
    }
    
    public function approve($id)
    {
        $lease = Lease::findOrFail($id);
        $lease->status = 'active';
        $lease->save();
        
        // Update unit status
        $unit = Unit::find($lease->unit_id);
        $unit->status = 'occupied';
        $unit->save();
        
        return redirect('/manager/requests')->with('success', 'Request approved!');
    }
    
    public function reject($id)
    {
        $lease = Lease::findOrFail($id);
        $lease->status = 'rejected';
        $lease->save();
        
        return redirect('/manager/requests')->with('success', 'Request rejected!');
    }
    public function requests()
{
    $user = Auth::user();
    $tenant = $user->tenant;
    
    $requests = Lease::where('tenant_id', $tenant->id)
        ->with('unit.property')
        ->orderBy('created_at', 'desc')
        ->get();
    
    return view('tenant.my-requests', [
        'requests' => $requests
    ]);
}
}