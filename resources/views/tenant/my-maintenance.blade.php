@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">My Maintenance</h2>
            <p class="text-gray-500 text-sm mt-1">Track your maintenance requests</p>
        </div>
        <a href="/tenant/maintenance/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
            <i class="fa-solid fa-plus mr-1"></i> New Request
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left text-sm">ID</th>
                    <th class="p-3 text-left text-sm">Title</th>
                    <th class="p-3 text-left text-sm">Unit</th>
                    <th class="p-3 text-left text-sm">Priority</th>
                    <th class="p-3 text-left text-sm">Status</th>
                    <th class="p-3 text-left text-sm">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($requests as $request)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 text-sm">#{{ $request->id }}</td>
                    <td class="p-3 text-sm">{{ $request->title }}</td>
                    <td class="p-3 text-sm">Unit {{ $request->unit->unit_number ?? 'N/A' }}</td>
                    <td class="p-3">
                        @if($request->priority == 'emergency')
                            <span class="px-2 py-1 rounded text-xs bg-red-100 text-red-700">Emergency</span>
                        @elseif($request->priority == 'high')
                            <span class="px-2 py-1 rounded text-xs bg-orange-100 text-orange-700">High</span>
                        @elseif($request->priority == 'medium')
                            <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-700">Medium</span>
                        @else
                            <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-700">Low</span>
                        @endif
                    </td>
                    <td class="p-3">
                        @if($request->status == 'pending')
                            <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-700">Pending</span>
                        @elseif($request->status == 'in_progress')
                            <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-700">In Progress</span>
                        @else
                            <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-700">Completed</span>
                        @endif
                    </td>
                    <td class="p-3 text-sm">{{ \Carbon\Carbon::parse($request->requested_date)->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">
                        <i class="fa-solid fa-tools text-4xl mb-2 block"></i>
                        No maintenance requests found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection