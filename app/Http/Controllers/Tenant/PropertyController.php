<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        
        return view('tenant.properties.index', [
            'properties' => $properties
        ]);
    }
    
    public function show($id)
    {
        $property = Property::with('units')->findOrFail($id);
        
        $availableCount = $property->units->where('status', 'available')->count();
        
        return view('tenant.properties.show', [
            'property' => $property,
            'availableCount' => $availableCount
        ]);
    }
}