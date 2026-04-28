@extends('layouts.app')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Available Properties</h1>
        <a href="/tenant/my-all-units" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm">
            My Units
        </a>
    </div>

    <!-- Properties Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($properties as $property)
        <div class="bg-white rounded-lg shadow p-4">
            
            <h3 class="text-lg font-bold text-gray-800">{{ $property->name }}</h3>
            <p class="text-gray-500 text-sm">{{ $property->address }}, {{ $property->city }}</p>
            
            <div class="mt-4">
                <p class="text-sm text-gray-600">Type: {{ $property->type }}</p>
                <p class="text-sm text-gray-600">Total Units: {{ $property->total_units }}</p>
            </div>
            
            <a href="/tenant/properties/{{ $property->id }}" 
               class="block text-center bg-blue-600 text-white py-2 rounded-lg mt-4">
                View Units
            </a>
        </div>
        @endforeach
    </div>

</div>
@endsection