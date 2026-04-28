<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tenant = $user->tenant;
        
        $payments = [];
        
        if ($tenant) {
            $lease = \App\Models\Lease::where('tenant_id', $tenant->id)
                ->where('status', 'active')
                ->first();
                
            if ($lease) {
                $payments = \App\Models\Payment::where('lease_id', $lease->id)
                    ->orderBy('payment_date', 'desc')
                    ->get();
            }
        }
        
        return view('tenant.my-payments', [
            'payments' => $payments
        ]);
    }
}