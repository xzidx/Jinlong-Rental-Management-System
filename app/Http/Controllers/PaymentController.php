<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('lease')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lease_id' => 'required|exists:leases,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        return Payment::create($data);
    }

    public function show($id)
    {
        return Payment::with('lease')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return $payment;
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}