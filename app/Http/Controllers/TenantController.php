<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        return Tenant::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:tenants,email',
        ]);

        return Tenant::create($data);
    }

    public function show($id)
    {
        return Tenant::with('leases')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->update($request->all());

        return $tenant;
    }

    public function destroy($id)
    {
        Tenant::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}