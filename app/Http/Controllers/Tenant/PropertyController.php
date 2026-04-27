<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['units' => function($query) {
            $query->where('status', 'available');
        }])->get();
        
        return view('tenant.properties.index', compact('properties'));
    }
    
    public function show($id)
    {
        $property = Property::with('units')->findOrFail($id);
        return view('tenant.properties.show', compact('property'));
    }
}