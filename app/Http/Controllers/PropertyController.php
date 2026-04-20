<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        // show all properties with units
        return Property::with('units')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
            'type' => 'required',
        ]);

        return Property::create($data);
    }

    public function show($id)
    {
        return Property::with('units')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return $property;
    }

    public function destroy($id)
    {
        Property::destroy($id);

        return response()->json(['message' => 'Deleted']);
    }
}