@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">My Dashboard</h2>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <div class="bg-blue-50 p-4 rounded-lg">
            <h3 class="text-lg font-bold text-blue-600">My Unit</h3>
            <p>Unit #101 - Sky Tower</p>
        </div>
        <div class="bg-green-50 p-4 rounded-lg">
            <h3 class="text-lg font-bold text-green-600">Next Payment</h3>
            <p>$1,200 due May 1, 2026</p>
        </div>
    </div>
</div>
@endsection
