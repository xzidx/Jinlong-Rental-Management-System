@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">My Maintenance</h2>
            <p class="text-gray-500 text-sm mt-1">Track your maintenance requests</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
            <i class="fa-solid fa-plus mr-1"></i> New Request
        </button>
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
                @php
                    $requests = [
                        ['id' => 'REQ-001', 'title' => 'AC Not Working', 'unit' => '101', 'priority' => 'High', 'status' => 'In Progress', 'date' => '2026-04-20'],
                        ['id' => 'REQ-002', 'title' => 'Leaking Pipe', 'unit' => '101', 'priority' => 'Medium', 'status' => 'Pending', 'date' => '2026-04-25'],
                    ];
                @endphp
                @foreach($requests as $request)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 text-sm">#{{ $request['id'] }}</td>
                    <td class="p-3 text-sm">{{ $request['title'] }}</td>
                    <td class="p-3 text-sm">Unit {{ $request['unit'] }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs {{ $request['priority'] == 'High' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $request['priority'] }}
                        </span>
                    </td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-700">{{ $request['status'] }}</span>
                    </td>
                    <td class="p-3 text-sm">{{ $request['date'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection