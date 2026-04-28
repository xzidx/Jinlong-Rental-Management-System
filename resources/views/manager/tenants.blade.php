@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Tenants Management</h2>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Add Tenant</button>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr><th class="p-3 text-left">Name</th><th class="p-3 text-left">Email</th><th class="p-3 text-left">Phone</th><th class="p-3 text-left">Unit</th><th class="p-3 text-left">Status</th></tr>
            </thead>
            <tbody>
                @foreach($tenants as $tenant)
                @php $lease = $tenant->leases->firstWhere('status', 'active'); @endphp
                <tr class="border-b">
                    <td class="p-3">{{ $tenant->first_name }} {{ $tenant->last_name }}</td>
                    <td class="p-3">{{ $tenant->email }}</td>
                    <td class="p-3">{{ $tenant->phone }}</td>
                    <td class="p-3">Unit {{ $lease->unit->unit_number ?? 'N/A' }}</td>
                    <td class="p-3"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Active</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection