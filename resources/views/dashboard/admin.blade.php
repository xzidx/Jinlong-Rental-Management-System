@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('header_title', 'Project Overview')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase">Properties</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">12</h3>
                </div>
                <div class="p-2 bg-blue-50 text-blue-600 rounded">
                    <i class="fa-solid fa-city"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase">Total Units</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">148</h3>
                </div>
                <div class="p-2 bg-slate-100 text-slate-700 rounded">
                    <i class="fa-solid fa-door-open"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase">Active Tenants</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">132</h3>
                </div>
                <div class="p-2 bg-emerald-50 text-emerald-600 rounded">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase">Monthly Revenue</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">$42,500</h3>
                </div>
                <div class="p-2 bg-blue-600 text-white rounded shadow-md">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm">
            <h4 class="text-sm font-bold text-slate-800 uppercase mb-6">Occupancy Rate</h4>
            <div class="h-48 flex items-center justify-center bg-slate-50 border border-dashed border-slate-200 rounded relative overflow-hidden">
                <div class="text-center z-10">
                    <p class="text-4xl font-black text-blue-500">89%</p>
                    <p class="text-xs text-slate-500 uppercase font-bold tracking-widest mt-1">Units Occupied</p>
                </div>
                <div class="absolute bottom-0 left-0 w-full h-1/2 bg-blue-500/5"></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg border border-slate-200 shadow-sm">
            <h4 class="text-sm font-bold text-slate-800 uppercase mb-6">Revenue Growth</h4>
            <div class="h-48 flex items-end gap-2 px-4 bg-slate-50 border border-dashed border-slate-200 rounded">
                <div class="flex-1 bg-slate-200 h-2/3 rounded-t"></div>
                <div class="flex-1 bg-slate-300 h-3/4 rounded-t"></div>
                <div class="flex-1 bg-slate-400 h-1/2 rounded-t"></div>
                <div class="flex-1 bg-blue-500 h-5/6 rounded-t shadow-lg"></div>
                <div class="flex-1 bg-slate-200 h-2/3 rounded-t"></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
        <div class="lg:col-span-2 bg-white rounded-lg border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-slate-200 flex justify-between items-center">
                <h4 class="font-bold text-sm text-slate-900">Recent Payments</h4>
                <button class="text-xs font-bold text-blue-500 hover:underline">Export CSV</button>
            </div>
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase">
                    <tr>
                        <th class="px-6 py-4 font-bold">Tenant</th>
                        <th class="px-6 py-4 font-bold">Unit</th>
                        <th class="px-6 py-4 font-bold">Amount</th>
                        <th class="px-6 py-4 font-bold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="px-6 py-4 font-bold">Chan Samnang</td>
                        <td class="px-6 py-4 text-slate-500">Unit 402</td>
                        <td class="px-6 py-4 font-bold text-slate-900">$1,200.00</td>
                        <td class="px-6 py-4"><span class="text-emerald-600 font-black text-[10px] uppercase italic">Confirmed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-red-50 rounded-lg border border-red-100 p-6 shadow-sm">
            <div class="flex items-center gap-2 text-red-600 mb-4">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h4 class="font-black text-sm uppercase">Expiring Leases</h4>
            </div>
            <div class="space-y-4">
                <div class="p-3 bg-white rounded border border-red-100 flex justify-between items-center shadow-sm">
                    <div>
                        <p class="text-xs font-bold text-slate-900">Unit 302 - B. Lee</p>
                        <p class="text-[10px] text-red-600 font-bold">Ends in 5 days</p>
                    </div>
                    <button class="text-[10px] bg-red-600 text-white px-2 py-1 rounded font-bold hover:bg-red-700">Renew</button>
                </div>
            </div>
        </div>
    </div>
@endsection