@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <!-- Header -->
    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Available Properties</h1>
            <p class="text-gray-500 text-sm mt-1">Browse all properties and find your next home</p>
        </div>
        <a href="/tenant/my-all-units" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-2 transition">
            <i class="fa-solid fa-building"></i>
            <span>My Units</span>
        </a>
    </div>

    <!-- Properties Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($properties as $property)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 group">
            <!-- Property Image Area -->
            <div class="h-32 bg-gradient-to-r from-blue-500 to-blue-700 relative">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all"></div>
                <div class="absolute bottom-3 left-3">
                    <span class="bg-white/90 text-gray-800 text-xs px-2 py-1 rounded-full">
                        <i class="fa-solid fa-building mr-1"></i> {{ ucfirst($property->type) }}
                    </span>
                </div>
            </div>
            
            <!-- Property Info -->
            <div class="p-5">
                <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $property->name }}</h3>
                <p class="text-gray-500 text-xs mb-3 flex items-center gap-1">
                    <i class="fa-solid fa-location-dot text-gray-400 text-xs"></i>
                    <span>{{ $property->address }}, {{ $property->city }}</span>
                </p>
                
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center gap-4">
                        <div class="text-center">
                            <p class="text-xl font-bold text-blue-600">{{ $property->units->where('status', 'available')->count() }}</p>
                            <p class="text-xs text-gray-500">Available</p>
                        </div>
                        <div class="text-center">
                            <!-- FIXED: Count actual units, not database total_units field -->
                            <p class="text-xl font-bold text-gray-800">{{ $property->units->count() }}</p>
                            <p class="text-xs text-gray-500">Total Units</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-500">Starting from</p>
                        <p class="text-lg font-bold text-green-600">
                            ${{ number_format($property->units->min('monthly_rent') ?? 0) }}
                        </p>
                    </div>
                </div>
                
                <a href="/tenant/properties/{{ $property->id }}" 
                   class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition-colors text-sm font-medium">
                    View Available Units
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-16 bg-white rounded-xl border border-gray-100">
            <i class="fa-solid fa-building-circle-exclamation text-5xl text-gray-300 mb-3"></i>
            <p class="text-gray-500 font-medium">No properties available</p>
            <p class="text-sm text-gray-400 mt-1">Please check back later</p>
        </div>
        @endforelse
    </div>
</div>
@endsection