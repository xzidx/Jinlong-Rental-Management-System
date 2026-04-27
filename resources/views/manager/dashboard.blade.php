@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Manager Dashboard</h2>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        <div class="bg-blue-50 p-4 rounded">
            <h3 class="font-bold text-blue-600">Properties</h3>
            <p>Manage properties</p>
        </div>
        <div class="bg-green-50 p-4 rounded">
            <h3 class="font-bold text-green-600">Tenants</h3>
            <p>Manage tenants</p>
        </div>
        <div class="bg-yellow-50 p-4 rounded">
            <h3 class="font-bold text-yellow-600">Reports</h3>
            <p>View reports</p>
        </div>
    </div>
</div>
@endsection
