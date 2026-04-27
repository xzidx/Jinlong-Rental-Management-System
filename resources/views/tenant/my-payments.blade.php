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
                @php
                    $payments = [
                        ['date' => '2026-04-01', 'unit' => '101', 'amount' => 1200, 'method' => 'Bank Transfer', 'status' => 'Paid'],
                        ['date' => '2026-03-01', 'unit' => '101', 'amount' => 1200, 'method' => 'Bank Transfer', 'status' => 'Paid'],
                        ['date' => '2026-02-01', 'unit' => '101', 'amount' => 1200, 'method' => 'Cash', 'status' => 'Paid'],
                    ];
                @endphp
                @foreach($payments as $payment)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 text-sm">{{ $payment['date'] }}</td>
                    <td class="p-3 text-sm">Unit {{ $payment['unit'] }}</td>
                    <td class="p-3 text-sm font-medium">${{ number_format($payment['amount']) }}</td>
                    <td class="p-3 text-sm">{{ $payment['method'] }}</td>
                    <td class="p-3">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">{{ $payment['status'] }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection