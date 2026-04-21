<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        return view('rent.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        // Store data in database
        Rent::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Data saved!');
    }

    public function show(Rent $rent)
    {
        //
    }

    public function edit(Rent $rent)
    {
        //
    }

    public function update(Request $request, Rent $rent)
    {
        //
    }

    public function destroy(Rent $rent)
    {
        //
    }
}