@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Pending Lease Requests</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left text-sm">Tenant</th>
                    <th class="p-3 text-left text-sm">Unit</th>
                    <th class="p-3 text-left text-sm">Property</th>
                    <th class="p-3 text-left text-sm">Move-in Date</th>
                    <th class="p-3 text-left text-sm">Monthly Rent</th>
                    <th class="p-3 text-left text-sm">Request Date</th>
                    <th class="p-3 text-left text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($pendingRequests as $request)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 text-sm">{{ $request->tenant->first_name }} {{ $request->tenant->last_name }}</td>
                    <td class="p-3 text-sm">Unit {{ $request->unit->unit_number }}</td>
                    <td class="p-3 text-sm">{{ $request->unit->property->name ?? 'N/A' }}</td>
                    <td class="p-3 text-sm">{{ \Carbon\Carbon::parse($request->start_date)->format('M d, Y') }}</td>
                    <td class="p-3 text-sm font-medium">${{ number_format($request->monthly_rent) }}</td>
                    <td class="p-3 text-sm">{{ $request->created_at->format('M d, Y') }}</td>
                    <td class="p-3">
                        <form method="POST" action="{{ route('manager.requests.approve', $request->id) }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm mr-2">
                                Approve
                            </button>
                        </form>
                        <form method="POST" action="{{ route('manager.requests.reject', $request->id) }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                Reject
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-400">
                        <i class="fa-regular fa-clipboard text-4xl mb-2 block"></i>
                        No pending lease requests
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection