@extends('layouts.customer')

@section('title', 'Address Book - DistroZone')

@section('content')
<div class="min-h-screen bg-[#FAFAF8] py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            {{-- Sidebar (Same as Profile) --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-[#F8F803] mx-auto mb-3 flex items-center justify-center">
                            <span class="text-2xl font-semibold text-[#1A1A1A]">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <h3 class="font-semibold text-lg text-[#1A1A1A]">{{ auth()->user()->name }}</h3>
                        <p class="text-sm text-[#737366]">Gold Member</p>
                    </div>

                    <nav class="space-y-1">
                        <a href="{{ route('customer.profile') }}" 
                           class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#737366] hover:bg-[#F5F5F0] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Profile
                        </a>
                        
                        <a href="{{ route('customer.orders') }}" 
                           class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#737366] hover:bg-[#F5F5F0] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Order History
                        </a>

                        <a href="{{ route('customer.addresses') }}" 
                           class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#F8F803] text-[#1A1A1A] font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Address Book
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="lg:col-span-3">
                
                {{-- Page Header --}}
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-[#1A1A1A] mb-2">Address Book</h1>
                        <p class="text-[#737366]">Manage your shipping addresses</p>
                    </div>
                    <button onclick="openAddModal()" 
                            class="px-4 py-2 bg-[#F8F803] text-[#1A1A1A] font-semibold rounded-lg hover:bg-[#E8E803] transition-colors">
                        Add New
                    </button>
                </div>

                {{-- Success Message --}}
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
                @endif

                {{-- Addresses Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    @forelse($addresses as $address)
                    <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3] relative">
                        {{-- Default Badge --}}
                        @if($address->is_default)
                        <span class="absolute top-4 right-4 px-2 py-1 bg-[#F8F803] text-[#1A1A1A] text-xs font-semibold rounded">
                            Default
                        </span>
                        @endif

                        {{-- Label --}}
                        <div class="flex items-center gap-2 mb-3">
                            @if($address->label === 'Home')
                            <svg class="w-5 h-5 text-[#F8F803]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            @else
                            <svg class="w-5 h-5 text-[#F8F803]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            @endif
                            <span class="font-semibold text-[#1A1A1A]">{{ $address->label ?: 'Address' }}</span>
                        </div>

                        {{-- Address Details --}}
                        <div class="text-sm text-[#737366] space-y-1 mb-4">
                            <p class="font-medium text-[#1A1A1A]">{{ $address->recipient_name }}</p>
                            <p>{{ $address->address }}</p>
                            <p>{{ $address->city }}, {{ $address->province }} {{ $address->postal_code }}</p>
                            <p>Phone: {{ $address->phone }}</p>
                        </div>

                        {{-- Actions --}}
                        <div class="flex gap-2">
                            @if(!$address->is_default)
                            <form method="POST" action="{{ route('customer.addresses.default', $address->id) }}">
                                @csrf
                                <button type="submit" 
                                        class="px-3 py-1 text-sm text-[#1A1A1A] border border-[#E8E8E3] rounded-lg hover:bg-[#F5F5F0] transition-colors">
                                    Set Default
                                </button>
                            </form>
                            @endif

                            <button onclick="openEditModal({{ $address->id }})" 
                                    class="px-3 py-1 text-sm text-[#F8F803] border border-[#F8F803] rounded-lg hover:bg-[#FFF9E6] transition-colors">
                                Edit
                            </button>

                            <form method="POST" action="{{ route('customer.addresses.destroy', $address->id) }}" 
                                  onsubmit="return confirm('Are you sure you want to delete this address?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 text-sm text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-2 text-center py-12">
                        <svg class="w-16 h-16 text-[#E8E8E3] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p class="text-[#737366] mb-4">No addresses saved yet</p>
                        <button onclick="openAddModal()" 
                                class="px-6 py-2 bg-[#F8F803] text-[#1A1A1A] font-semibold rounded-lg hover:bg-[#E8E803] transition-colors">
                            Add Your First Address
                        </button>
                    </div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>
</div>

{{-- Modal placeholder (you can add actual modal forms here) --}}
<script>
function openAddModal() {
    alert('Add Address Modal - Will be implemented with form');
}

function openEditModal(id) {
    alert('Edit Address Modal for ID: ' + id + ' - Will be implemented with form');
}
</script>
@endsection