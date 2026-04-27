@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Welcome back, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-blue-100 mt-1">System Administrator - Manage users, settings, and monitor activities.</p>
            </div>
            <div class="bg-white/20 rounded-full p-3">
                <i class="fa-solid fa-shield-haltered text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-blue-500 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Properties</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalProperties ?? 0 }}</p>
                </div>
                <div class="bg-blue-100 rounded-xl p-3">
                    <i class="fa-solid fa-building text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-green-500 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Units</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalUnits ?? 0 }}</p>
                </div>
                <div class="bg-green-100 rounded-xl p-3">
                    <i class="fa-solid fa-door-open text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-yellow-500 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Active Tenants</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalTenants ?? 0 }}</p>
                </div>
                <div class="bg-yellow-100 rounded-xl p-3">
                    <i class="fa-solid fa-users text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-purple-500 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">System Users</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalUsers ?? 0 }}</p>
                </div>
                <div class="bg-purple-100 rounded-xl p-3">
                    <i class="fa-solid fa-user-shield text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="/admin/users" class="bg-white rounded-2xl shadow-sm p-6 text-center hover:shadow-md transition-all group">
            <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-600 transition-colors">
                <i class="fa-solid fa-users-gear text-2xl text-blue-600 group-hover:text-white"></i>
            </div>
            <h3 class="font-bold text-gray-800">User Management</h3>
            <p class="text-sm text-gray-500 mt-1">Manage admin & manager accounts</p>
        </a>

        <a href="/admin/activity-logs" class="bg-white rounded-2xl shadow-sm p-6 text-center hover:shadow-md transition-all group">
            <div class="bg-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 transition-colors">
                <i class="fa-solid fa-clock-rotate-left text-2xl text-green-600 group-hover:text-white"></i>
            </div>
            <h3 class="font-bold text-gray-800">Activity Logs</h3>
            <p class="text-sm text-gray-500 mt-1">Monitor system activities</p>
        </a>

        <a href="/admin/settings" class="bg-white rounded-2xl shadow-sm p-6 text-center hover:shadow-md transition-all group">
            <div class="bg-purple-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-600 transition-colors">
                <i class="fa-solid fa-gear text-2xl text-purple-600 group-hover:text-white"></i>
            </div>
            <h3 class="font-bold text-gray-800">System Settings</h3>
            <p class="text-sm text-gray-500 mt-1">Configure system preferences</p>
        </a>
    </div>

    <!-- Charts & Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Revenue Chart -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-gray-800">Revenue Overview</h3>
                <span class="text-xs text-gray-400">Last 6 months</span>
            </div>
            <canvas id="revenueChart" height="200"></canvas>
        </div>

        <!-- Recent System Activities -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-gray-800">Recent System Activities</h3>
                <a href="/admin/activity-logs" class="text-blue-600 text-sm hover:underline">View All →</a>
            </div>
            <div class="space-y-3 max-h-64 overflow-y-auto">
                @forelse($recentActivities ?? [] as $activity)
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fa-solid fa-user text-blue-600 text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-800">{{ $activity->description ?? 'User action' }}</p>
                        <p class="text-xs text-gray-400">{{ $activity->created_at ?? 'Just now' }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-6 text-gray-400">No recent activities</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Expiring Leases Alert (View Only) -->
    @if(($expiringLeases ?? collect())->count() > 0)
    <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-4">
        <div class="flex items-center">
            <i class="fa-solid fa-exclamation-triangle text-yellow-500 mr-3"></i>
            <div>
                <p class="font-bold text-yellow-700">Expiring Leases Alert</p>
                <p class="text-sm text-yellow-600">{{ $expiringLeases->count() }} leases will expire in the next 30 days.</p>
            </div>
            <a href="/admin/leases" class="ml-auto bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm">View Details</a>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($revenueLabels ?? ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']) !!},
            datasets: [{
                label: 'Revenue ($)',
                data: {!! json_encode($revenueData ?? [35000, 38000, 42000, 45000, 48000, 52000]) !!},
                borderColor: '#2563EB',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { position: 'top' }
            }
        }
    });
</script>
@endpush
@endsection
