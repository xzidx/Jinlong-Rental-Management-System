@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Reports Dashboard</h2>
            <p class="text-gray-500 text-sm mt-1">View property performance and financial reports</p>
        </div>
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Export Report
        </button>
    </div>

    <!-- Report Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Revenue Report Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-5 py-3 text-white">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold">Revenue Report</h3>
                    <i class="fa-solid fa-dollar-sign text-xl"></i>
                </div>
            </div>
            <div class="p-5">
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b">
                        <span class="text-gray-600">Total Revenue</span>
                        <span class="text-2xl font-bold text-green-600">${{ number_format($totalRevenue) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">This Month</span>
                        <span class="text-lg font-semibold text-gray-800">${{ number_format($monthlyRevenue) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Pending Payments</span>
                        <span class="text-lg font-semibold text-yellow-600">${{ number_format($pendingPayments) }}</span>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        @php
                            $percentage = $totalRevenue > 0 ? round(($monthlyRevenue / $totalRevenue) * 100) : 0;
                        @endphp
                        <div class="bg-green-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">{{ $percentage }}% of total revenue this month</p>
                </div>
            </div>
        </div>

        <!-- Occupancy Report Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-5 py-3 text-white">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold">Occupancy Report</h3>
                    <i class="fa-solid fa-chart-pie text-xl"></i>
                </div>
            </div>
            <div class="p-5">
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b">
                        <span class="text-gray-600">Occupancy Rate</span>
                        <span class="text-2xl font-bold text-blue-600">{{ $occupancyRate }}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Occupied Units</span>
                        <span class="text-lg font-semibold text-gray-800">{{ $occupiedUnits }} / {{ $totalUnits }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Available Units</span>
                        <span class="text-lg font-semibold text-green-600">{{ $totalUnits - $occupiedUnits }}</span>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $occupancyRate }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">{{ $occupancyRate }}% of units are occupied</p>
                </div>
            </div>
        </div>

        <!-- Maintenance Report Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-5 py-3 text-white">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold">Maintenance Report</h3>
                    <i class="fa-solid fa-tools text-xl"></i>
                </div>
            </div>
            <div class="p-5">
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b">
                        <span class="text-gray-600">Total Requests</span>
                        <span class="text-2xl font-bold text-orange-600">{{ $totalRequests }}</span>
                    </div>
                    <div class="grid grid-cols-3 gap-2 text-center">
                        <div>
                            <p class="text-xs text-gray-500">Pending</p>
                            <p class="text-lg font-bold text-yellow-600">{{ $pendingRequests }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">In Progress</p>
                            <p class="text-lg font-bold text-blue-600">{{ $inProgressRequests }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Completed</p>
                            <p class="text-lg font-bold text-green-600">{{ $completedRequests }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t">
                    @php
                        $completionRate = $totalRequests > 0 ? round(($completedRequests / $totalRequests) * 100) : 0;
                    @endphp
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: {{ $completionRate }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">{{ $completionRate }}% completion rate</p>
                </div>
            </div>
        </div>

        <!-- Lease Report Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-5 py-3 text-white">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold">Lease Report</h3>
                    <i class="fa-solid fa-file-contract text-xl"></i>
                </div>
            </div>
            <div class="p-5">
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b">
                        <span class="text-gray-600">Active Leases</span>
                        <span class="text-2xl font-bold text-purple-600">{{ $activeLeases }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Expired Leases</span>
                        <span class="text-lg font-semibold text-red-600">{{ $expiredLeases }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Expiring Soon (30 days)</span>
                        <span class="text-lg font-semibold text-yellow-600">{{ $expiringSoon }}</span>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t">
                    @php
                        $activePercentage = $activeLeases + $expiredLeases > 0 ? round(($activeLeases / ($activeLeases + $expiredLeases)) * 100) : 0;
                    @endphp
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-purple-600 h-2 rounded-full" style="width: {{ $activePercentage }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">{{ $activePercentage }}% active lease rate</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Payments Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-5 py-4 border-b bg-gray-50 flex justify-between items-center">
            <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                <i class="fa-solid fa-credit-card text-green-500"></i>
                Recent Payments
            </h3>
            <span class="text-xs text-gray-400">Last 10 transactions</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 text-left text-sm font-medium text-gray-500">Date</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-500">Tenant</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-500">Unit</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-500">Amount</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-500">Method</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-500">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($recentPayments as $payment)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 text-sm">{{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}</td>
                        <td class="p-3 text-sm font-medium text-gray-800">{{ $payment->lease->tenant->first_name ?? 'N/A' }} {{ $payment->lease->tenant->last_name ?? '' }}</td>
                        <td class="p-3 text-sm">Unit {{ $payment->lease->unit->unit_number ?? 'N/A' }}</td>
                        <td class="p-3 text-sm font-bold text-gray-800">${{ number_format($payment->amount) }}</td>
                        <td class="p-3 text-sm capitalize">{{ $payment->payment_method }}</td>
                        <td class="p-3">
                            @if($payment->status == 'paid')
                                <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">
                                    <i class="fa-solid fa-check-circle text-xs"></i> Paid
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">
                                    <i class="fa-solid fa-clock text-xs"></i> Pending
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-400">
                            <i class="fa-solid fa-receipt text-4xl mb-2 block"></i>
                            No payment records found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection