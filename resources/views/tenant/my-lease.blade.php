@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">My Lease</h2>
    <div class="grid grid-cols-2 gap-4">
        <p><strong>Lease ID:</strong> L-001</p>
        <p><strong>Start Date:</strong> 2026-01-01</p>
        <p><strong>End Date:</strong> 2026-12-31</p>
        <p><strong>Monthly Rent:</strong> $1,200</p>
        <p><strong>Security Deposit:</strong> $1,200</p>
        <p><strong>Status:</strong> <span class="text-green-600">Active</span></p>
    </div>
</div>
@endsection
