@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">My Payments</h2>
    <table class="w-full">
        <thead class="bg-gray-100">
            <tr><th class="p-2 text-left">Date</th><th class="p-2 text-left">Amount</th><th class="p-2 text-left">Status</th></tr>
        </thead>
        <tbody>
            <tr><td class="p-2">2026-04-01</td><td class="p-2">$1,200</td><td class="p-2 text-green-600">Paid</td></tr>
            <tr><td class="p-2">2026-03-01</td><td class="p-2">$1,200</td><td class="p-2 text-green-600">Paid</td></tr>
        </tbody>
    </table>
</div>
@endsection
