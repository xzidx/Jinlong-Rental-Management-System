@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">My Unit</h2>
    <div class="grid grid-cols-2 gap-4">
        <p><strong>Unit Number:</strong> 101</p>
        <p><strong>Building:</strong> Sky Tower</p>
        <p><strong>Floor:</strong> 1</p>
        <p><strong>Bedrooms:</strong> 2</p>
        <p><strong>Bathrooms:</strong> 2</p>
        <p><strong>Area:</strong> 850 sqft</p>
        <p><strong>Monthly Rent:</strong> $1,200</p>
        <p><strong>Status:</strong> <span class="text-green-600">Occupied</span></p>
    </div>
</div>
@endsection
