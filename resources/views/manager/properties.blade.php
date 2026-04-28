@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Properties Management</h2>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Add Property</button>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr><th class="p-3 text-left">Name</th><th class="p-3 text-left">Address</th><th class="p-3 text-left">Units</th><th class="p-3 text-left">Status</th></tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                <tr class="border-b">
                    <td class="p-3">{{ $property->name }}</td>
                    <td class="p-3">{{ $property->address }}, {{ $property->city }}</td>
                    <td class="p-3">{{ $property->units->count() }}</td>
                    <td class="p-3"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Active</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection