@extends('layouts.app')

@section('title', 'Tenant Dashboard')
@section('header_title', 'Project Overview')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Monthly Rent</p>
                <span class="bg-emerald-100 text-emerald-600 p-2 rounded-lg text-xs"><i class="fa-solid fa-wallet"></i></span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800 mt-2">$1,200.00</h3>
            <div class="flex items-center gap-2 mt-3">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <p class="text-xs text-emerald-600 font-semibold">Paid for October</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Lease Progress</p>
            <h3 class="text-2xl font-extrabold text-slate-800 mt-2 text-indigo-600">65 Days</h3>
            <p class="text-xs text-slate-500 mt-3 font-medium italic">Until renewal window opens</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Active Requests</p>
            <h3 class="text-2xl font-extrabold text-slate-800 mt-2">01</h3>
            <p class="text-xs text-orange-500 font-bold mt-3 underline decoration-2 underline-offset-4 pointer-cursor">1 Pending Action</p>
        </div>

        <button class="bg-slate-900 hover:bg-indigo-600 text-white rounded-2xl p-6 shadow-xl shadow-slate-200 transition-all group relative overflow-hidden text-left">
            <div class="relative z-10 flex flex-col items-start h-full justify-between">
                <i class="fa-solid fa-plus-circle text-2xl mb-2 group-hover:rotate-90 transition-transform duration-300"></i>
                <div>
                    <span class="text-lg font-bold block">New Request</span>
                    <p class="text-xs opacity-70">Report a maintenance issue</p>
                </div>
            </div>
            <i class="fa-solid fa-screwdriver-wrench absolute -right-4 -bottom-4 text-6xl opacity-10 group-hover:scale-110 transition-transform"></i>
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-50 flex justify-between items-center">
                    <h4 class="font-extrabold text-sm text-slate-800 uppercase tracking-wider">Resource Consumption</h4>
                </div>
                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="group">
                        <div class="flex justify-between items-end mb-3">
                            <div>
                                <p class="text-xs font-bold text-slate-800">Electricity</p>
                                <p class="text-[10px] text-slate-400 uppercase">Usage Limit: 200 kWh</p>
                            </div>
                            <span class="text-indigo-600 font-black text-sm">145 kWh</span>
                        </div>
                        <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden shadow-inner">
                            <div class="bg-gradient-to-r from-indigo-400 to-indigo-600 h-full rounded-full transition-all duration-1000 shadow-[0_0_8px_rgba(79,70,229,0.4)]" style="width: 72.5%"></div>
                        </div>
                    </div>
                    <div class="group">
                        <div class="flex justify-between items-end mb-3">
                            <div>
                                <p class="text-xs font-bold text-slate-800">Water</p>
                                <p class="text-[10px] text-slate-400 uppercase">Usage Limit: 30 m³</p>
                            </div>
                            <span class="text-blue-500 font-black text-sm">12 m³</span>
                        </div>
                        <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden shadow-inner">
                            <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-full rounded-full transition-all duration-1000 shadow-[0_0_8px_rgba(59,130,246,0.4)]" style="width: 40%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-50 flex justify-between items-center">
                    <h4 class="font-extrabold text-sm text-slate-800 uppercase tracking-wider">Maintenance Records</h4>
                    <button class="text-xs font-bold text-slate-400 hover:text-indigo-600 transition-colors uppercase">View All</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50 text-[11px] font-bold uppercase text-slate-400">
                            <tr>
                                <th class="px-8 py-4">Ticket</th>
                                <th class="px-8 py-4">Description</th>
                                <th class="px-8 py-4 text-center">Status</th>
                                <th class="px-8 py-4 text-right">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-8 py-5 font-bold text-slate-800 text-sm">#REQ-882</td>
                                <td class="px-8 py-5 text-sm text-slate-600 font-medium">Leaking Kitchen Sink</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="bg-orange-50 text-orange-600 px-3 py-1 rounded-full text-[10px] font-bold border border-orange-100">IN PROGRESS</span>
                                </td>
                                <td class="px-8 py-5 text-right text-xs font-bold text-slate-400 group-hover:text-slate-600">24 Apr 2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-gradient-to-br from-indigo-700 via-indigo-600 to-blue-600 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden group">
                <p class="text-[11px] font-bold text-indigo-100 uppercase tracking-[2px] mb-6">Upcoming Payment</p>
                <h2 class="text-4xl font-black mb-1">$1,200.00</h2>
                <p class="text-sm opacity-80">Due on Nov 01, 2026</p>
                <button class="w-full mt-8 py-4 bg-white text-indigo-600 font-extrabold rounded-xl shadow-lg hover:scale-[1.02] transition-transform flex items-center justify-center gap-3">
                    <i class="fa-solid fa-credit-card"></i> Pay Rent Now
                </button>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <h4 class="font-extrabold text-xs text-slate-800 uppercase tracking-[2px] mb-6">Building News</h4>
                <div class="space-y-6">
                    <div class="flex gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors cursor-pointer">
                        <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center">
                            <i class="fa-solid fa-bolt-lightning text-indigo-500 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-xs font-extrabold text-slate-800">Elevator Maintenance</p>
                            <p class="text-[11px] text-slate-500 mt-1">Sat, 2-4 PM. Use North stairs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection