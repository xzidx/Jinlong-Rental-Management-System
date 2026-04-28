@extends('layouts.app')

@section('content')
<div class="p-6">

    <!-- Welcome Banner - More Modern -->
    <div class="bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 rounded-2xl p-6 mb-8 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Welcome back, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-blue-100 mt-1 text-sm">Here's what's happening with your rental today</p>
            </div>
            <div class="bg-white/20 rounded-full p-3 backdrop-blur-sm">
                <i class="fa-solid fa-home text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- 4 Cards - More Modern Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- My Unit Card -->
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
            <div class="p-5">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-blue-100 rounded-xl p-2">
                        <i class="fa-solid fa-door-open text-blue-600 text-lg"></i>
                    </div>
                    <span class="text-xs text-green-500 bg-green-50 px-2 py-1 rounded-full">Active</span>
                </div>
                <h3 class="text-gray-500 text-xs uppercase tracking-wider mb-1">My Unit</h3>
                <p class="text-2xl font-bold text-gray-800">#101</p>
                <p class="text-sm text-gray-500 mt-1">Sky Tower • Floor 1</p>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
                <p class="text-xs text-gray-500">2 Bedrooms • 2 Bathrooms</p>
            </div>
        </div>

        <!-- Next Payment Card -->
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-green-200">
            <div class="p-5">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-green-100 rounded-xl p-2">
                        <i class="fa-solid fa-credit-card text-green-600 text-lg"></i>
                    </div>
                    <span class="text-xs text-yellow-500 bg-yellow-50 px-2 py-1 rounded-full">Upcoming</span>
                </div>
                <h3 class="text-gray-500 text-xs uppercase tracking-wider mb-1">Next Payment</h3>
                <p class="text-2xl font-bold text-gray-800">$1,200</p>
                <p class="text-sm text-gray-500 mt-1">Due May 1, 2026</p>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
                <div class="w-full bg-gray-200 rounded-full h-1.5">
                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 75%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-2">15 days remaining</p>
            </div>
        </div>

        <!-- Lease Status Card -->
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-purple-200">
            <div class="p-5">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-purple-100 rounded-xl p-2">
                        <i class="fa-solid fa-file-contract text-purple-600 text-lg"></i>
                    </div>
                    <span class="text-xs text-green-500 bg-green-50 px-2 py-1 rounded-full">Active</span>
                </div>
                <h3 class="text-gray-500 text-xs uppercase tracking-wider mb-1">Lease Status</h3>
                <p class="text-2xl font-bold text-gray-800">Active</p>
                <p class="text-sm text-gray-500 mt-1">265 days remaining</p>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
                <p class="text-xs text-gray-500">Ends: December 31, 2026</p>
            </div>
        </div>

        <!-- Maintenance Card -->
        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-orange-200">
            <div class="p-5">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-orange-100 rounded-xl p-2">
                        <i class="fa-solid fa-tools text-orange-600 text-lg"></i>
                    </div>
                    <span class="text-xs text-green-500 bg-green-50 px-2 py-1 rounded-full">All Good</span>
                </div>
                <h3 class="text-gray-500 text-xs uppercase tracking-wider mb-1">Maintenance</h3>
                <p class="text-2xl font-bold text-gray-800">0</p>
                <p class="text-sm text-gray-500 mt-1">Active requests</p>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
                <a href="/tenant/my-maintenance" class="text-xs text-orange-600 hover:text-orange-700 flex items-center gap-1">
                    Request Repair <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- Quick Action Buttons - More Modern -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="/tenant/properties" class="group relative overflow-hidden bg-gradient-to-r from-blue-500 to-blue-600 text-white p-4 rounded-xl text-center hover:shadow-lg transition-all duration-300">
            <i class="fa-solid fa-building text-xl mb-2 block group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium">Browse Properties</span>
            <div class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 transform scale-x-0 group-hover:scale-x-100 transition-transform"></div>
        </a>
        
        <a href="/tenant/my-payments" class="group relative overflow-hidden bg-gradient-to-r from-green-500 to-green-600 text-white p-4 rounded-xl text-center hover:shadow-lg transition-all duration-300">
            <i class="fa-solid fa-credit-card text-xl mb-2 block group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium">My Payments</span>
            <div class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 transform scale-x-0 group-hover:scale-x-100 transition-transform"></div>
        </a>
        
        <a href="/tenant/my-lease" class="group relative overflow-hidden bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-xl text-center hover:shadow-lg transition-all duration-300">
            <i class="fa-solid fa-file-contract text-xl mb-2 block group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium">My Lease</span>
            <div class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 transform scale-x-0 group-hover:scale-x-100 transition-transform"></div>
        </a>
        
        <a href="/tenant/my-maintenance" class="group relative overflow-hidden bg-gradient-to-r from-orange-500 to-orange-600 text-white p-4 rounded-xl text-center hover:shadow-lg transition-all duration-300">
            <i class="fa-solid fa-tools text-xl mb-2 block group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium">Maintenance</span>
            <div class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 transform scale-x-0 group-hover:scale-x-100 transition-transform"></div>
        </a>
    </div>

</div>
@endsection