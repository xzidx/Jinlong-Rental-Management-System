@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-600 rounded-2xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Welcome back, {{ Auth::user()->name }}! 👔</h2>
                <p class="text-green-100 text-sm mt-1">Here's your management overview</p>
            </div>
            <div class="bg-white/20 rounded-full p-3">
                <i class="fa-solid fa-chart-line text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-5 hover:shadow-md transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-xs uppercase tracking-wide">Total Properties</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalProperties }}</p>
                </div>
                <div class="bg-blue-100 rounded-lg p-2">
                    <i class="fa-solid fa-building text-blue-600 text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border-l-4 border-green-500 p-5 hover:shadow-md transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-xs uppercase tracking-wide">Total Units</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalUnits }}</p>
                </div>
                <div class="bg-green-100 rounded-lg p-2">
                    <i class="fa-solid fa-door-open text-green-600 text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border-l-4 border-yellow-500 p-5 hover:shadow-md transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-xs uppercase tracking-wide">Total Tenants</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalTenants }}</p>
                </div>
                <div class="bg-yellow-100 rounded-lg p-2">
                    <i class="fa-solid fa-users text-yellow-600 text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border-l-4 border-purple-500 p-5 hover:shadow-md transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-xs uppercase tracking-wide">Active Leases</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $activeLeases }}</p>
                </div>
                <div class="bg-purple-100 rounded-lg p-2">
                    <i class="fa-solid fa-file-contract text-purple-600 text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        
        <a href="/manager/properties" class="group bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white hover:shadow-lg transition-all transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <i class="fa-solid fa-building text-3xl mb-2 block"></i>
                    <h3 class="text-lg font-bold">Properties</h3>
                    <p class="text-blue-100 text-sm">Manage all properties</p>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl opacity-0 group-hover:opacity-100 transition"></i>
            </div>
        </a>

        <a href="/manager/tenants" class="group bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white hover:shadow-lg transition-all transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <i class="fa-solid fa-users text-3xl mb-2 block"></i>
                    <h3 class="text-lg font-bold">Tenants</h3>
                    <p class="text-green-100 text-sm">Manage tenants</p>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl opacity-0 group-hover:opacity-100 transition"></i>
            </div>
        </a>

        <a href="/manager/reports" class="group bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white hover:shadow-lg transition-all transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <i class="fa-solid fa-chart-line text-3xl mb-2 block"></i>
                    <h3 class="text-lg font-bold">Reports</h3>
                    <p class="text-purple-100 text-sm">View reports</p>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl opacity-0 group-hover:opacity-100 transition"></i>
            </div>
        </a>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Recent Leases -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-5 py-3 border-b bg-gray-50">
                <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fa-solid fa-file-contract text-blue-500"></i>
                    Recent Leases
                </h3>
            </div>
            <div class="divide-y">
                @php
                    $recentLeases = \App\Models\Lease::with('tenant', 'unit')->latest()->take(5)->get();
                @endphp
                @forelse($recentLeases as $lease)
                <div class="flex justify-between items-center p-4 hover:bg-gray-50">
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $lease->tenant->first_name ?? 'N/A' }} {{ $lease->tenant->last_name ?? '' }}</p>
                        <p class="text-xs text-gray-500">Unit {{ $lease->unit->unit_number ?? 'N/A' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-green-600">${{ number_format($lease->monthly_rent) }}</p>
                        <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($lease->start_date)->format('M d, Y') }}</p>
                    </div>
                </div>
                @empty
                <div class="p-6 text-center text-gray-400">No recent leases</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Payments -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-5 py-3 border-b bg-gray-50">
                <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fa-solid fa-credit-card text-green-500"></i>
                    Recent Payments
                </h3>
            </div>
            <div class="divide-y">
                @php
                    $recentPayments = \App\Models\Payment::with('lease.tenant')->latest()->take(5)->get();
                @endphp
                @forelse($recentPayments as $payment)
                <div class="flex justify-between items-center p-4 hover:bg-gray-50">
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $payment->lease->tenant->first_name ?? 'N/A' }} {{ $payment->lease->tenant->last_name ?? '' }}</p>
                        <p class="text-xs text-gray-500">{{ $payment->payment_method }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-800">${{ number_format($payment->amount) }}</p>
                        @if($payment->status == 'paid')
                            <span class="text-xs text-green-500">✓ Paid</span>
                        @else
                            <span class="text-xs text-yellow-500">Pending</span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="p-6 text-center text-gray-400">No recent payments</div>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection