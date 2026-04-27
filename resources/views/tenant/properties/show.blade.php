@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="/tenant/properties" class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 text-sm">
            <i class="fa-solid fa-arrow-left text-xs"></i> Back to Properties
        </a>
    </div>

    <!-- Property Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl p-5 text-white mb-5">
        <div class="flex flex-wrap justify-between items-start gap-3">
            <div>
                <h1 class="text-2xl font-bold">{{ $property->name }}</h1>
                <p class="text-blue-100 text-sm mt-1">
                    <i class="fa-solid fa-location-dot text-xs mr-1"></i>{{ $property->address }}, {{ $property->city }}
                </p>
                <div class="flex flex-wrap gap-2 mt-2">
                    <span class="bg-white/20 px-2 py-0.5 rounded-full text-xs">{{ ucfirst($property->type) }}</span>
                    @if($property->construction_year)
                    <span class="bg-white/20 px-2 py-0.5 rounded-full text-xs">Built {{ $property->construction_year }}</span>
                    @endif
                    <span class="bg-white/20 px-2 py-0.5 rounded-full text-xs">{{ $property->total_units }} Total Units</span>
                </div>
            </div>
            <div class="text-center bg-white/10 rounded-lg px-4 py-2">
                <p class="text-blue-200 text-xs">Available</p>
                <p class="text-2xl font-bold">{{ $property->units->where('status', 'available')->count() }}</p>
            </div>
        </div>
    </div>

    <!-- Description -->
    @if($property->description)
    <div class="bg-white rounded-lg shadow-sm border p-4 mb-5">
        <div class="flex items-center gap-2 mb-1">
            <i class="fa-regular fa-file-lines text-blue-500"></i>
            <h3 class="font-semibold text-gray-800 text-sm">About This Property</h3>
        </div>
        <p class="text-gray-600 text-sm">{{ $property->description }}</p>
    </div>
    @endif

    <!-- Units Section -->
    <div class="mb-5">
        <div class="flex justify-between items-center mb-3">
            <h2 class="text-lg font-bold text-gray-800">Available Units</h2>
            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">
                {{ $property->units->where('status', 'available')->count() }} available
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($property->units as $unit)
            <div class="bg-white rounded-lg shadow-sm border overflow-hidden hover:shadow-md transition">
                <!-- Unit Header -->
                <div class="px-3 py-2 border-b flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Unit {{ $unit->unit_number }}</h3>
                        <p class="text-xs text-gray-400">Floor {{ $unit->floor_number ?? 'N/A' }}</p>
                    </div>
                    @if($unit->status == 'available')
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full">Available</span>
                    @elseif($unit->status == 'occupied')
                        <span class="bg-red-100 text-red-700 text-xs px-2 py-0.5 rounded-full">Occupied</span>
                    @else
                        <span class="bg-amber-100 text-amber-700 text-xs px-2 py-0.5 rounded-full">Maintenance</span>
                    @endif
                </div>

                <!-- Unit Details -->
                <div class="p-3">
                    <div class="grid grid-cols-2 gap-2 text-sm mb-2">
                        <div class="flex items-center gap-1">
                            <i class="fa-regular fa-bed text-gray-400 text-xs w-3"></i>
                            <span class="text-gray-600 text-xs">{{ $unit->bedrooms }} beds</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa-regular fa-bath text-gray-400 text-xs w-3"></i>
                            <span class="text-gray-600 text-xs">{{ $unit->bathrooms }} baths</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa-regular fa-square text-gray-400 text-xs w-3"></i>
                            <span class="text-gray-600 text-xs">{{ $unit->area_sqft ?? 'N/A' }} sqft</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa-regular fa-calendar text-gray-400 text-xs w-3"></i>
                            <span class="text-gray-600 text-xs">Available Now</span>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="border-t pt-2 mt-1">
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <p class="text-xs text-gray-500">Monthly Rent</p>
                                <p class="text-xl font-bold text-blue-600">${{ number_format($unit->monthly_rent) }}</p>
                            </div>
                            @if($unit->security_deposit)
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Deposit</p>
                                <p class="text-sm font-medium">${{ number_format($unit->security_deposit) }}</p>
                            </div>
                            @endif
                        </div>

                        @if($unit->status == 'available')
                        <button onclick="openRentModal({{ $unit->id }})" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-1.5 rounded-lg text-sm transition">
                            Request to Rent
                        </button>
                        @else
                        <button disabled class="w-full bg-gray-100 text-gray-400 py-1.5 rounded-lg text-sm cursor-not-allowed">
                            Not Available
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 bg-white rounded-lg border">
                <i class="fa-regular fa-building text-4xl text-gray-300 mb-2"></i>
                <p class="text-gray-500">No units available in this property</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- COMPACT SHORT MODAL -->
<div id="rentModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg w-80 mx-4 shadow-xl">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 rounded-t-lg flex justify-between items-center">
            <h3 class="text-white font-medium text-sm">Request to Rent</h3>
            <button onclick="closeRentModal()" class="text-white/80 hover:text-white text-xl leading-none">&times;</button>
        </div>
        
        <div class="p-4">
            <p class="text-xs text-gray-600 mb-3">Request will be sent to manager for approval.</p>
            
            <form id="rentRequestForm" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-xs text-gray-600 mb-1">Move-in Date *</label>
                    <input type="date" name="move_in_date" id="moveInDate" required 
                           class="w-full border rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>
                <div class="mb-3">
                    <label class="block text-xs text-gray-600 mb-1">Notes (Optional)</label>
                    <textarea name="notes" rows="2" placeholder="Any special requests..." 
                              class="w-full border rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
                </div>
                <div class="flex gap-2 mt-3">
                    <button type="button" onclick="closeRentModal()" 
                            class="flex-1 border border-gray-300 rounded-lg py-1.5 text-sm hover:bg-gray-50 transition">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-1.5 text-sm transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
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
    
    document.getElementById('rentModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeRentModal();
        }
    });
</script>
@endsection