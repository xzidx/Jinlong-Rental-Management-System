@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">My Unit</h2>
        
        @if($unit)
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-500 text-sm">Unit Number</p>
                <p class="font-bold">{{ $unit->unit_number }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Building</p>
                <p class="font-bold">{{ $unit->property->name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Floor</p>
                <p class="font-bold">{{ $unit->floor_number ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Bedrooms</p>
                <p class="font-bold">{{ $unit->bedrooms }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Bathrooms</p>
                <p class="font-bold">{{ $unit->bathrooms }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Area</p>
                <p class="font-bold">{{ $unit->area_sqft ?? 'N/A' }} sqft</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Monthly Rent</p>
                <p class="font-bold text-blue-600">${{ number_format($unit->monthly_rent) }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Status</p>
                <p class="font-bold text-green-600">{{ ucfirst($unit->status) }}</p>
            </div>
        </div>
        @else
        <p class="text-gray-500">No unit found</p>
        <a href="/tenant/properties" class="text-blue-600">Browse Properties</a>
        @endif
    </div>
</div>
@endsection