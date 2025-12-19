@extends('layouts.customer')

@section('title', 'Your Cart - DistroZone')

@section('content')
<div class="min-h-screen bg-[#FAFAF8] py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-[#1A1A1A] mb-2">Your Cart</h1>
            <p class="text-[#F8F803]">2 items in your bag</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Cart Items --}}
            <div class="lg:col-span-2 space-y-4">
                
                {{-- Cart Header --}}
                <div class="grid grid-cols-12 gap-4 px-6 py-3 text-xs font-semibold text-[#F8F803] uppercase tracking-wider">
                    <div class="col-span-6">Product</div>
                    <div class="col-span-3 text-center">Quantity</div>
                    <div class="col-span-3 text-right">Price</div>
                </div>

                {{-- Cart Item 1 --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="grid grid-cols-12 gap-4 items-center">
                        {{-- Product Info --}}
                        <div class="col-span-6 flex items-center gap-4">
                            <img src="https://placehold.co/100x100/F8F803/1A1A1A?text=Tee" 
                                 class="w-24 h-24 rounded-lg object-cover bg-[#F5F5F0]" 
                                 alt="Urban Drift Tee">
                            <div>
                                <h3 class="font-semibold text-[#1A1A1A] mb-1">Urban Drift Tee</h3>
                                <p class="text-sm text-[#737366] mb-2">Size: M</p>
                                <div class="inline-flex items-center gap-2 px-2 py-1 bg-green-50 text-green-700 text-xs font-medium rounded">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                    In stock
                                </div>
                            </div>
                        </div>

                        {{-- Quantity Controls --}}
                        <div class="col-span-3 flex items-center justify-center">
                            <div class="inline-flex items-center bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg">
                                <button type="button" 
                                        class="px-3 py-2 text-[#1A1A1A] hover:bg-[#F5F5F0] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <input type="number" 
                                       value="1" 
                                       min="1"
                                       class="w-12 text-center bg-transparent border-none focus:outline-none font-medium text-[#1A1A1A]">
                                <button type="button" 
                                        class="px-3 py-2 text-[#1A1A1A] hover:bg-[#F5F5F0] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Price & Remove --}}
                        <div class="col-span-3 flex flex-col items-end gap-2">
                            <span class="text-xl font-bold text-[#1A1A1A]">Rp45.000</span>
                            <button type="button" 
                                    class="text-[#F8F803] hover:text-[#E8E803] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Cart Item 2 --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="grid grid-cols-12 gap-4 items-center">
                        {{-- Product Info --}}
                        <div class="col-span-6 flex items-center gap-4">
                            <img src="https://placehold.co/100x100/1A1A1A/F8F803?text=Hoodie" 
                                 class="w-24 h-24 rounded-lg object-cover bg-[#F5F5F0]" 
                                 alt="Neon Night Hoodie">
                            <div>
                                <h3 class="font-semibold text-[#1A1A1A] mb-1">Neon Night Hoodie</h3>
                                <p class="text-sm text-[#737366] mb-2">Size: L</p>
                                <div class="inline-flex items-center gap-2 px-2 py-1 bg-yellow-50 text-yellow-700 text-xs font-medium rounded">
                                    <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                                    Low stock
                                </div>
                            </div>
                        </div>

                        {{-- Quantity Controls --}}
                        <div class="col-span-3 flex items-center justify-center">
                            <div class="inline-flex items-center bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg">
                                <button type="button" 
                                        class="px-3 py-2 text-[#1A1A1A] hover:bg-[#F5F5F0] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <input type="number" 
                                       value="1" 
                                       min="1"
                                       class="w-12 text-center bg-transparent border-none focus:outline-none font-medium text-[#1A1A1A]">
                                <button type="button" 
                                        class="px-3 py-2 text-[#1A1A1A] hover:bg-[#F5F5F0] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Price & Remove --}}
                        <div class="col-span-3 flex flex-col items-end gap-2">
                            <span class="text-xl font-bold text-[#1A1A1A]">Rp85.000</span>
                            <button type="button" 
                                    class="text-[#F8F803] hover:text-[#E8E803] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Continue Shopping --}}
                <a href="{{ route('shop') }}" 
                   class="inline-flex items-center gap-2 text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors mt-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Continue Shopping
                </a>

            </div>

            {{-- Order Summary Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3] sticky top-24">
                    <h2 class="text-xl font-bold text-[#1A1A1A] mb-6">Order Summary</h2>

                    {{-- Summary Items --}}
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-[#737366]">
                            <span>Subtotal</span>
                            <span class="font-semibold text-[#1A1A1A]">Rp130.000</span>
                        </div>

                        <div class="flex justify-between text-[#737366]">
                            <span>Shipping estimate</span>
                            <span class="text-sm italic text-[#F8F803]">Calculated at checkout</span>
                        </div>

                        <div class="flex justify-between text-[#737366]">
                            <span>Tax</span>
                            <span class="font-semibold text-[#1A1A1A]">Rp0.00</span>
                        </div>
                    </div>

                    {{-- Promo Code --}}
                    <div class="mb-6 pb-6 border-b border-[#E8E8E3]">
                        <label class="block text-xs font-semibold text-[#F8F803] uppercase tracking-wider mb-2">
                            Promo Code
                        </label>
                        <div class="flex gap-2">
                            <input type="text" 
                                   placeholder="Enter code"
                                   class="flex-1 px-3 py-2 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent text-sm">
                            <button type="button" 
                                    class="px-4 py-2 bg-[#E8E8E3] text-[#1A1A1A] font-medium rounded-lg hover:bg-[#D8D8D3] transition-colors text-sm">
                                Apply
                            </button>
                        </div>
                    </div>

                    {{-- Total --}}
                    <div class="flex justify-between items-baseline mb-6">
                        <span class="text-lg font-semibold text-[#1A1A1A]">Total</span>
                        <span class="text-3xl font-bold text-[#1A1A1A]">Rp130.000</span>
                    </div>

                    {{-- Checkout Button --}}
                    <a href="{{ route('checkout') }}" 
                       class="block w-full px-6 py-4 bg-[#F8F803] text-[#1A1A1A] font-bold rounded-lg hover:bg-[#E8E803] transition-colors text-center mb-3">
                        <div class="flex items-center justify-center gap-2">
                            <span>Proceed to Checkout</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </a>

                    {{-- Secure Checkout Badge --}}
                    <div class="flex items-center justify-center gap-2 text-sm text-[#737366]">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Secure Checkout</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection