@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Activity Logs</h2>
        <p class="text-gray-500 mt-1">Track all system activities and user actions</p>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-2xl shadow-sm p-4">
        <form method="GET" class="flex flex-wrap gap-4">
            <div class="flex-1 relative">
               
                <input type="text" name="search" placeholder="Filter by user or action..." 
                       value="{{ request('search') }}"
                       class="w-full pl-10 pr-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <input type="date" name="date" value="{{ request('date') }}" 
                   class="border rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <select name="action" class="border rounded-xl px-10 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Actions</option>
                @foreach($actions as $action)
                    <option value="{{ $action }}" {{ request('action') == $action ? 'selected' : '' }}>
                        {{ $action }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700">Filter</button>
            <a href="{{ route('admin.activity-logs') }}" class="border border-gray-300 px-6 py-2 rounded-xl hover:bg-gray-50">Reset</a>
        </form>
    </div>

    <!-- Activity Timeline -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50 flex justify-between items-center">
            <h3 class="font-bold text-gray-800">Recent Activities</h3>
            <span class="text-sm text-gray-500">Total: {{ $activities->total() }} activities</span>
        </div>
        
        <div class="divide-y">
            @forelse($activities as $activity)
            <div class="flex items-center gap-4 p-4 hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 rounded-full flex items-center justify-center 
                    {{ $activity->action == 'CREATE' ? 'bg-green-100' : '' }}
                    {{ $activity->action == 'UPDATE' ? 'bg-blue-100' : '' }}
                    {{ $activity->action == 'DELETE' ? 'bg-red-100' : '' }}
                    {{ $activity->action == 'LOGIN' ? 'bg-purple-100' : '' }}">
                    <i class="fa-solid 
                        {{ $activity->action == 'CREATE' ? 'fa-plus text-green-600' : '' }}
                        {{ $activity->action == 'UPDATE' ? 'fa-pen text-blue-600' : '' }}
                        {{ $activity->action == 'DELETE' ? 'fa-trash text-red-600' : '' }}
                        {{ $activity->action == 'LOGIN' ? 'fa-sign-in-alt text-purple-600' : '' }}
                    "></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-gray-800">{{ $activity->user->name ?? 'System' }}</span>
                        <span class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-gray-600">
                        @if($activity->action == 'CREATE')
                            Created new {{ str_replace('_', ' ', $activity->table_name) }}
                        @elseif($activity->action == 'UPDATE')
                            Updated {{ str_replace('_', ' ', $activity->table_name) }} #{{ $activity->record_id }}
                        @elseif($activity->action == 'DELETE')
                            Deleted {{ str_replace('_', ' ', $activity->table_name) }} #{{ $activity->record_id }}
                        @elseif($activity->action == 'LOGIN')
                            Logged into the system
                        @else
                            {{ $activity->action }} {{ $activity->table_name }}
                        @endif
                    </p>
                    <p class="text-xs text-gray-400 mt-1">IP: {{ $activity->ip_address ?? 'N/A' }}</p>
                </div>
                <div>
                    <span class="px-2 py-1 text-xs rounded-full 
                        {{ $activity->action == 'CREATE' ? 'bg-green-100 text-green-600' : '' }}
                        {{ $activity->action == 'UPDATE' ? 'bg-blue-100 text-blue-600' : '' }}
                        {{ $activity->action == 'DELETE' ? 'bg-red-100 text-red-600' : '' }}
                        {{ $activity->action == 'LOGIN' ? 'bg-purple-100 text-purple-600' : '' }}">
                        {{ $activity->action }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <i class="fa-solid fa-inbox text-5xl text-gray-300 mb-3"></i>
                <p class="text-gray-500">No activity logs found</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t bg-gray-50">
            {{ $activities->links() }}
        </div>
    </div>
</div>
@endsection
