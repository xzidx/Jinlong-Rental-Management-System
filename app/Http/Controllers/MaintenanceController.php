<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('maintenance.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(miantenance $miantenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(miantenance $miantenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, miantenance $miantenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(miantenance $miantenance)
    {
        //
    }
}
