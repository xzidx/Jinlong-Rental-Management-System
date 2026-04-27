@extends('layouts.app')

@section('title', 'Tenant Dashboard')
@section('header_title', 'My Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        {{-- CARD 1: Monthly Rent --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Monthly Rent</p>
                <span class="bg-emerald-100 text-emerald-600 p-2 rounded-lg text-xs">
                    <i class="fa-solid fa-wallet"></i>
                </span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800 mt-2">${{ number_format($monthlyRent, 2) }}</h3>
            <div class="flex items-center gap-2 mt-3">
                @if($lastPaymentStatus == 'paid')
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <p class="text-xs text-emerald-600 font-semibold">Paid for {{ $lastPaymentMonth }}</p>
                @else
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                    <p class="text-xs text-red-600 font-semibold">Pending payment</p>
                @endif
            </div>
        </div>

        {{-- CARD 2: Lease Progress --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Lease Progress</p>
            <h3 class="text-2xl font-extrabold text-slate-800 mt-2 text-indigo-600">{{ $daysLeft }} Days</h3>
            <p class="text-xs text-slate-500 mt-3 font-medium italic">
                @if($daysLeft <= 30)
                    <span class="text-orange-500">⚠️ Renewal window opens soon!</span>
                @else
                    Until renewal window opens
                @endif
            </p>
        </div>

        {{-- CARD 3: Active Maintenance Requests --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Active Requests</p>
            <h3 class="text-2xl font-extrabold text-slate-800 mt-2">{{ $activeRequestsCount }}</h3>
            @if($activeRequestsCount > 0)
                <p class="text-xs text-orange-500 font-bold mt-3 underline decoration-2 underline-offset-4">
                    {{ $activeRequestsCount }} Pending Action
                </p>
            @else
                <p class="text-xs text-emerald-500 font-bold mt-3">
                    No active requests ✓
                </p>
            @endif
        </div>

        {{-- CARD 4: New Request Button --}}
        <a href="{{ route('tenant.maintenance.create') }}" 
           class="bg-slate-900 hover:bg-indigo-600 text-white rounded-2xl p-6 shadow-xl shadow-slate-200 transition-all group relative overflow-hidden block">
            <div class="relative z-10 flex flex-col items-start h-full justify-between">
                <i class="fa-solid fa-plus-circle text-2xl mb-2 group-hover:rotate-90 transition-transform duration-300"></i>
                <div>
                    <span class="text-lg font-bold block">New Request</span>
                    <p class="text-xs opacity-70">Report a maintenance issue</p>
                </div>
            </div>
            <i class="fa-solid fa-screwdriver-wrench absolute -right-4 -bottom-4 text-6xl opacity-10 group-hover:scale-110 transition-transform"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
        <div class="lg:col-span-2 space-y-8">
            
            {{-- MAINTENANCE RECORDS TABLE --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-50 flex justify-between items-center">
                    <h4 class="font-extrabold text-sm text-slate-800 uppercase tracking-wider">Maintenance Records</h4>
                    <a href="{{ route('tenant.maintenance.index') }}" 
                       class="text-xs font-bold text-slate-400 hover:text-indigo-600 transition-colors uppercase">
                        View All
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50 text-[11px] font-bold uppercase text-slate-400">
                            <tr>
                                <th class="px-8 py-4">Ticket</th>
                                <th class="px-8 py-4">Description</th>
                                <th class="px-8 py-4 text-center">Priority</th>
                                <th class="px-8 py-4 text-center">Status</th>
                                <th class="px-8 py-4 text-right">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($maintenanceRequests as $request)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-8 py-5 font-bold text-slate-800 text-sm">#{{ $request->id }}</td>
                                <td class="px-8 py-5 text-sm text-slate-600 font-medium">{{ $request->title }}</td>
                                <td class="px-8 py-5 text-center">
                                    @if($request->priority == 'emergency')
                                        <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-[10px] font-bold">EMERGENCY</span>
                                    @elseif($request->priority == 'high')
                                        <span class="bg-orange-50 text-orange-600 px-3 py-1 rounded-full text-[10px] font-bold">HIGH</span>
                                    @elseif($request->priority == 'medium')
                                        <span class="bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-[10px] font-bold">MEDIUM</span>
                                    @else
                                        <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-[10px] font-bold">LOW</span>
                                    @endif
                                </td>
                                <td class="px-8 py-5 text-center">
                                    @if($request->status == 'pending')
                                        <span class="bg-orange-50 text-orange-600 px-3 py-1 rounded-full text-[10px] font-bold">PENDING</span>
                                    @elseif($request->status == 'in_progress')
                                        <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-[10px] font-bold">IN PROGRESS</span>
                                    @elseif($request->status == 'completed')
                                        <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-[10px] font-bold">COMPLETED</span>
                                    @else
                                        <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-[10px] font-bold">CANCELLED</span>
                                    @endif
                                </td>
                                <td class="px-8 py-5 text-right text-xs font-bold text-slate-400">
                                    {{ $request->requested_date->format('d M Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-10 text-center text-slate-400">
                                    <i class="fa-solid fa-check-circle text-4xl mb-2 block"></i>
                                    No maintenance requests yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            
            {{-- UPCOMING PAYMENT CARD --}}
            <div class="bg-gradient-to-br from-indigo-700 via-indigo-600 to-blue-600 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden group">
                <p class="text-[11px] font-bold text-indigo-100 uppercase tracking-[2px] mb-6">Upcoming Payment</p>
                <h2 class="text-4xl font-black mb-1">${{ number_format($nextPaymentAmount, 2) }}</h2>
                <p class="text-sm opacity-80">Due on {{ $nextDueDate->format('M d, Y') }}</p>
                @if($nextDueDate->isPast() && $nextPaymentStatus != 'paid')
                    <p class="text-xs text-red-200 mt-2">⚠️ OVERDUE - Please pay immediately</p>
                @endif
                <a href="{{ route('tenant.payments.index') }}" 
                   class="w-full mt-8 py-4 bg-white text-indigo-600 font-extrabold rounded-xl shadow-lg hover:scale-[1.02] transition-transform flex items-center justify-center gap-3">
                    <i class="fa-solid fa-credit-card"></i> Pay Rent Now
                </a>
            </div>

            {{-- RECENT PAYMENTS --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <h4 class="font-extrabold text-xs text-slate-800 uppercase tracking-[2px] mb-6">Recent Payments</h4>
                <div class="space-y-4">
                    @forelse($recentPayments as $payment)
                    <div class="flex justify-between items-center p-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <div>
                            <p class="text-xs font-bold text-slate-800">{{ $payment->payment_date->format('M Y') }}</p>
                            <p class="text-[10px] text-slate-400">{{ $payment->payment_method }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-800">${{ number_format($payment->amount, 2) }}</p>
                            @if($payment->status == 'paid')
                                <span class="text-[10px] text-emerald-500">✓ Paid</span>
                            @else
                                <span class="text-[10px] text-orange-500">⏰ Pending</span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-slate-400 text-sm py-4">No payment records yet</p>
                    @endforelse
                </div>
                <a href="{{ route('tenant.payments.index') }}" 
                   class="w-full mt-4 text-center text-xs font-bold text-indigo-600 hover:text-indigo-700 block">
                    View Payment History →
                </a>
            </div>

            {{-- UNIT INFORMATION --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <h4 class="font-extrabold text-xs text-slate-800 uppercase tracking-[2px] mb-6">My Unit</h4>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Unit Number</span>
                        <span class="text-xs font-bold text-slate-800">{{ $unitNumber }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Building</span>
                        <span class="text-xs font-bold text-slate-800">{{ $buildingName }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Floor</span>
                        <span class="text-xs font-bold text-slate-800">{{ $floorNumber }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Bedrooms</span>
                        <span class="text-xs font-bold text-slate-800">{{ $bedrooms }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Bathrooms</span>
                        <span class="text-xs font-bold text-slate-800">{{ $bathrooms }}</span>
                    </div>
                </div>
                <a href="{{ route('tenant.unit') }}" 
                   class="w-full mt-4 text-center text-xs font-bold text-indigo-600 hover:text-indigo-700 block">
                    View Unit Details →
                </a>
            </div>
        </div>
    </div>
@endsection