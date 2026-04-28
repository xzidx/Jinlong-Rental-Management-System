@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-4">
            <h2 class="text-xl font-bold text-white">My Lease Agreement</h2>
            <p class="text-blue-100 text-sm mt-1">View your current lease details</p>
        </div>

        @if($lease)
        <!-- Lease Details -->
        <div class="p-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Lease ID</label>
                    <p class="text-gray-800 font-medium mt-1">#{{ $lease->id }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Status</label>
                    <p class="mt-1">
                        @if($lease->status == 'active')
                            <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded-full text-xs font-medium">Active</span>
                        @elseif($lease->status == 'expired')
                            <span class="bg-red-100 text-red-700 px-2 py-0.5 rounded-full text-xs font-medium">Expired</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full text-xs font-medium">Pending</span>
                        @endif
                    </p>
                </div>
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Unit Number</label>
                    <p class="text-gray-800 font-medium mt-1">{{ $lease->unit->unit_number ?? 'N/A' }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Property</label>
                    <p class="text-gray-800 font-medium mt-1">{{ $lease->unit->property->name ?? 'N/A' }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Start Date</label>
                    <p class="text-gray-800 font-medium mt-1">{{ \Carbon\Carbon::parse($lease->start_date)->format('F d, Y') }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">End Date</label>
                    <p class="text-gray-800 font-medium mt-1">{{ \Carbon\Carbon::parse($lease->end_date)->format('F d, Y') }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Monthly Rent</label>
                    <p class="text-2xl font-bold text-blue-600 mt-1">${{ number_format($lease->monthly_rent) }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Security Deposit</label>
                    <p class="text-gray-800 font-medium mt-1">${{ number_format($lease->security_deposit ?? 0) }}</p>
                </div>
                <div class="md:col-span-2">
                    <label class="text-xs text-gray-500 uppercase tracking-wide">Terms & Conditions</label>
                    <p class="text-gray-600 text-sm mt-1 bg-gray-50 p-3 rounded-lg">{{ $lease->terms_conditions ?? 'Standard lease agreement applies.' }}</p>
                </div>
            </div>

            <!-- Days Remaining -->
            <div class="mt-5 pt-4 border-t">
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">Lease Progress</span>
                    <span class="text-gray-600">{{ $daysLeft }} days remaining</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progressPercent }}%"></div>
                </div>
            </div>
        </div>
        @else
        <!-- No Active Lease -->
        <div class="p-8 text-center">
            <i class="fa-regular fa-file-lines text-5xl text-gray-300 mb-3"></i>
            <p class="text-gray-500 font-medium">No active lease found</p>
            <p class="text-sm text-gray-400 mt-1">You don't have an active lease agreement yet.</p>
            <a href="/tenant/properties" class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                Browse Properties
            </a>
        </div>
        @endif
    </div>
</div>
@endsection