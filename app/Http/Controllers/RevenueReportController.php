<?php

namespace App\Http\Controllers;

use App\Models\revenue_report;
use Illuminate\Http\Request;

class RevenueReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('revenue_report.index');
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
    public function show(revenue_report $revenue_report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(revenue_report $revenue_report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, revenue_report $revenue_report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(revenue_report $revenue_report)
    {
        //
    }
}
