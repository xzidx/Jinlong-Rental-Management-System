<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function index()
    {
        return Lease::with(['unit','tenant','payments'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'unit_id' => 'required|exists:units,id',
            'tenant_id' => 'required|exists:tenants,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        return Lease::create($data);
    }

    public function show($id)
    {
        return Lease::with(['unit','tenant','payments'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $lease = Lease::findOrFail($id);
        $lease->update($request->all());

        return $lease;
    }

    public function destroy($id)
    {
        Lease::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}