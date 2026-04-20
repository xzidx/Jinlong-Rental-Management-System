<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return Unit::with('property')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'unit_number' => 'required',
            'monthly_rent' => 'required|numeric',
        ]);

        return Unit::create($data);
    }

    public function show($id)
    {
        return Unit::with(['property','leases'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());

        return $unit;
    }

    public function destroy($id)
    {
        Unit::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}