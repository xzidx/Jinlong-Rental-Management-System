@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">My Payments</h2>
            <p class="text-gray-500 text-sm mt-1">View your payment history</p>
        </div>
        <a href="/tenant/properties" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
            <i class="fa-solid fa-plus mr-1"></i> Rent More
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left text-sm">Date</th>
                    <th class="p-3 text-left text-sm">Unit</th>
                    <th class="p-3 text-left text-sm">Amount</th>
                    <th class="p-3 text-left text-sm">Method</th>
                    <th class="p-3 text-left text-sm">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($payments as $payment)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 text-sm">{{ \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') }}</td>
                    <td class="p-3 text-sm">Unit {{ $payment->lease->unit->unit_number ?? 'N/A' }}</td>
                    <td class="p-3 text-sm font-medium">${{ number_format($payment->amount) }}</td>
                    <td class="p-3 text-sm">{{ ucfirst($payment->payment_method) }}</td>
                    <td class="p-3">
                        @if($payment->status == 'paid')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Paid</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Pending</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-400">
                        <i class="fa-solid fa-receipt text-4xl mb-2 block"></i>
                        No payment records found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection