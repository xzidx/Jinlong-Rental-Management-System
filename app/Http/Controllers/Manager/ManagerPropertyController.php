<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Property;

class ManagerPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('units')->get();
        
        return view('manager.properties', [
            'properties' => $properties
        ]);
    }
}