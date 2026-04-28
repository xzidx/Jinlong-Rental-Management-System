\@extends('layouts.app')

@section('content')
<div class="p-6">

    <!-- Back Button -->
    <a href="/tenant/properties" class="text-blue-600 text-sm mb-4 inline-block">← Back to Properties</a>

    <!-- Property Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl p-5 text-white mb-5">
        <h1 class="text-2xl font-bold">{{ $property->name }}</h1>
        <p class="text-sm mt-1">{{ $property->address }}, {{ $property->city }}</p>
        <div class="flex gap-2 mt-2">
            <span class="bg-white/20 px-2 py-0.5 rounded-full text-xs">{{ ucfirst($property->type) }}</span>
            @if($property->construction_year)
                <span class="bg-white/20 px-2 py-0.5 rounded-full text-xs">Built {{ $property->construction_year }}</span>
            @endif
        </div>
    </div>

    <!-- Description -->
    @if($property->description)
    <div class="bg-white rounded-lg shadow p-4 mb-5">
        <h3 class="font-bold text-gray-800 text-sm mb-1">About This Property</h3>
        <p class="text-gray-600 text-sm">{{ $property->description }}</p>
    </div>
    @endif

    <!-- Units Section -->
    <h2 class="text-lg font-bold text-gray-800 mb-3">Units</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($property->units as $unit)
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Unit {{ $unit->unit_number }}</h3>
                @if($unit->status == 'available')
                    <span class="bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full">Available</span>
                @elseif($unit->status == 'occupied')
                    <span class="bg-red-100 text-red-700 text-xs px-2 py-0.5 rounded-full">Occupied</span>
                @else
                    <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-0.5 rounded-full">Maintenance</span>
                @endif
            </div>
            
            <div class="mt-2">
                <p><strong>Floor:</strong> {{ $unit->floor_number ?? 'N/A' }}</p>
                <p><strong>Bedrooms:</strong> {{ $unit->bedrooms }}</p>
                <p><strong>Bathrooms:</strong> {{ $unit->bathrooms }}</p>
                <p><strong>Area:</strong> {{ $unit->area_sqft ?? 'N/A' }} sqft</p>
                <p class="text-xl font-bold text-blue-600 mt-2">${{ number_format($unit->monthly_rent) }}/month</p>
            </div>
            
            @if($unit->status == 'available')
            <button onclick="openRentModal({{ $unit->id }})" 
                    class="w-full bg-blue-600 text-white py-2 rounded-lg mt-3">
                Request to Rent
            </button>
            @else
            <button disabled class="w-full bg-gray-300 text-gray-500 py-2 rounded-lg mt-3 cursor-not-allowed">
                Not Available
            </button>
            @endif
        </div>
        @endforeach
    </div>

</div>

<!-- Modal -->
<div id="rentModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg w-96 p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Request to Rent</h3>
            <button onclick="closeRentModal()" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
        </div>
        
        <p class="text-sm text-gray-600 mb-4">Request will be sent to manager for approval.</p>
        
        <form id="rentRequestForm" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Move-in Date *</label>
                <input type="date" name="move_in_date" id="moveInDate" required 
                       class="w-full border rounded-lg px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Notes (Optional)</label>
                <textarea name="notes" rows="2" placeholder="Any special requests..." 
                          class="w-full border rounded-lg px-3 py-2"></textarea>
            </div>
            <div class="flex gap-2">
                <button type="button" onclick="closeRentModal()" 
                        class="flex-1 border border-gray-300 rounded-lg py-2">Cancel</button>
                <button type="submit" 
                        class="flex-1 bg-blue-600 text-white rounded-lg py-2">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openRentModal(unitId) {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('moveInDate').min = today;
        document.getElementById('rentRequestForm').action = '/tenant/request-lease/' + unitId;
        document.getElementById('rentModal').classList.remove('hidden');
        document.getElementById('rentModal').classList.add('flex');
    }
    
    function closeRentModal() {
        document.getElementById('rentModal').classList.add('hidden');
        document.getElementById('rentModal').classList.remove('flex');
        document.getElementById('rentRequestForm').reset();
    }
</script>
@endsection