@extends('layouts.customer')

@section('title', 'Order #DZ-88329 - DistroZone')

@section('content')
<div class="min-h-screen bg-[#FAFAF8] py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-[#737366] mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#F8F803]">Home</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('customer.profile') }}" class="hover:text-[#F8F803]">My Account</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('customer.orders') }}" class="hover:text-[#F8F803]">Orders</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-[#1A1A1A] font-medium">#DZ-88329</span>
        </nav>

        {{-- Page Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <h1 class="text-3xl font-bold text-[#1A1A1A]">Order #DZ-88329</h1>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-[#F8F803] text-[#1A1A1A]">
                    Pending Payment
                </span>
            </div>

            <div class="flex gap-3">
                <button class="px-4 py-2 bg-white border border-[#E8E8E3] rounded-lg text-[#1A1A1A] hover:bg-[#F5F5F0] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </button>
                <button class="px-4 py-2 bg-[#1A1A1A] text-white rounded-lg hover:bg-[#2A2A2A] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </div>
        </div>

        <p class="text-[#737366] mb-6">Placed on Oct 24, 2023 at 4:32 PM</p>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Left Column --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Items Ordered --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <h2 class="text-xl font-semibold text-[#1A1A1A] mb-6">Items Ordered (3)</h2>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-[#E8E8E3]">
                                    <th class="pb-3 text-left text-xs font-semibold text-[#737366] uppercase">Product</th>
                                    <th class="pb-3 text-left text-xs font-semibold text-[#737366] uppercase">Details</th>
                                    <th class="pb-3 text-center text-xs font-semibold text-[#737366] uppercase">Qty</th>
                                    <th class="pb-3 text-right text-xs font-semibold text-[#737366] uppercase">Price</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E8E8E3]">
                                {{-- Product 1 --}}
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="https://placehold.co/80x80/E8E8E3/737366?text=Tee" 
                                                 class="w-20 h-20 rounded-lg object-cover bg-[#F5F5F0]" 
                                                 alt="Urban Glitch Tee">
                                            <div>
                                                <h3 class="font-semibold text-[#1A1A1A]">Urban Glitch Tee</h3>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 text-sm text-[#737366]">
                                        Black / L
                                    </td>
                                    <td class="py-4 text-center font-medium text-[#1A1A1A]">
                                        1
                                    </td>
                                    <td class="py-4 text-right font-semibold text-[#1A1A1A]">
                                        Rp45.000
                                    </td>
                                </tr>

                                {{-- Product 2 --}}
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="https://placehold.co/80x80/1A1A1A/F8F803?text=Hoodie" 
                                                 class="w-20 h-20 rounded-lg object-cover bg-[#F5F5F0]" 
                                                 alt="Night City Hoodie">
                                            <div>
                                                <h3 class="font-semibold text-[#1A1A1A]">Night City Hoodie</h3>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 text-sm text-[#737366]">
                                        Navy / M
                                    </td>
                                    <td class="py-4 text-center font-medium text-[#1A1A1A]">
                                        1
                                    </td>
                                    <td class="py-4 text-right font-semibold text-[#1A1A1A]">
                                        Rp55.000
                                    </td>
                                </tr>

                                {{-- Product 3 --}}
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="https://placehold.co/80x80/737366/FFFFFF?text=Cap" 
                                                 class="w-20 h-20 rounded-lg object-cover bg-[#F5F5F0]" 
                                                 alt="Distro Cap">
                                            <div>
                                                <h3 class="font-semibold text-[#1A1A1A]">Distro Cap</h3>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 text-sm text-[#737366]">
                                        One Size / Olive
                                    </td>
                                    <td class="py-4 text-center font-medium text-[#1A1A1A]">
                                        1
                                    </td>
                                    <td class="py-4 text-right font-semibold text-[#1A1A1A]">
                                        Rp25.000
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Shipment Status --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <h2 class="text-xl font-semibold text-[#1A1A1A] mb-6">Shipment Status</h2>

                    <div class="relative">
                        {{-- Progress Line --}}
                        <div class="absolute top-5 left-0 w-1/4 h-1 bg-blue-500"></div>
                        <div class="absolute top-5 left-1/4 w-3/4 h-1 bg-[#E8E8E3]"></div>

                        {{-- Progress Steps --}}
                        <div class="relative flex justify-between">
                            {{-- Step 1: Order Placed --}}
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center mb-2">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-semibold text-[#1A1A1A] mb-1">Order Placed</h3>
                                <p class="text-xs text-[#737366] text-center">Your order is being prepared. We will notify you once it ships.</p>
                            </div>

                            {{-- Step 2: Processing --}}
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-10 h-10 rounded-full bg-[#E8E8E3] flex items-center justify-center mb-2">
                                    <div class="w-2 h-2 rounded-full bg-[#737366]"></div>
                                </div>
                                <h3 class="text-sm font-medium text-[#737366] mb-1">Processing</h3>
                                <p class="text-xs text-[#737366] text-center opacity-0">-</p>
                            </div>

                            {{-- Step 3: Shipped --}}
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-10 h-10 rounded-full bg-[#E8E8E3] flex items-center justify-center mb-2">
                                    <div class="w-2 h-2 rounded-full bg-[#737366]"></div>
                                </div>
                                <h3 class="text-sm font-medium text-[#737366] mb-1">Shipped</h3>
                                <p class="text-xs text-[#737366] text-center opacity-0">-</p>
                            </div>

                            {{-- Step 4: Delivered --}}
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-10 h-10 rounded-full bg-[#E8E8E3] flex items-center justify-center mb-2">
                                    <div class="w-2 h-2 rounded-full bg-[#737366]"></div>
                                </div>
                                <h3 class="text-sm font-medium text-[#737366] mb-1">Delivered</h3>
                                <p class="text-xs text-[#737366] text-center opacity-0">-</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right Column --}}
            <div class="space-y-6">
                
                {{-- Proof Required Alert --}}
                <div class="bg-[#FFF9E6] border-2 border-dashed border-[#F8F803] rounded-lg p-6">
                    <div class="flex items-start gap-3 mb-4">
                        <svg class="w-6 h-6 text-[#F8F803] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-[#1A1A1A] mb-1">Proof Required</h3>
                            <p class="text-sm text-[#737366]">Your order is reserved but requires payment verification to proceed.</p>
                        </div>
                    </div>
                    <a href="{{ route('payment.upload', 'DZ-88329') }}" 
                       class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-[#F8F803] text-[#1A1A1A] font-semibold rounded-lg hover:bg-[#E8E803] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        Upload Receipt
                    </a>
                </div>

                {{-- Summary --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <h2 class="text-lg font-semibold text-[#1A1A1A] mb-4">Summary</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-[#737366]">Subtotal</span>
                            <span class="font-medium text-[#1A1A1A]">Rp125.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-[#737366]">Shipping (Standard)</span>
                            <span class="font-medium text-[#1A1A1A]">Rp12.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-[#737366]">Tax (8%)</span>
                            <span class="font-medium text-[#1A1A1A]">Rp10.000</span>
                        </div>

                        <div class="pt-3 border-t border-[#E8E8E3]">
                            <div class="flex justify-between items-baseline">
                                <span class="font-semibold text-[#1A1A1A]">Total</span>
                                <span class="text-2xl font-bold text-blue-600">Rp147.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Shipping Address --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-[#F8F803]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <h3 class="font-semibold text-[#1A1A1A]">SHIPPING ADDRESS</h3>
                    </div>
                    <div class="text-sm text-[#737366] space-y-1">
                        <p class="font-medium text-[#1A1A1A]">Jane Doe</p>
                        <p>123 Streetwear Blvd, Apt 4B</p>
                        <p>New York, NY 10001</p>
                        <p>United States</p>
                    </div>
                </div>

                {{-- Billing Address --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-[#F8F803]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="font-semibold text-[#1A1A1A]">BILLING ADDRESS</h3>
                    </div>
                    <p class="text-sm text-[#737366]">Same as shipping address</p>
                </div>

                {{-- Payment Method --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-[#F8F803]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        <h3 class="font-semibold text-[#1A1A1A]">PAYMENT METHOD</h3>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="https://placehold.co/40x25/1A1A1A/FFFFFF?text=VISA" class="w-10 h-6" alt="Visa">
                        <div class="text-sm">
                            <p class="font-medium text-[#1A1A1A]">Visa ending in 4242</p>
                            <p class="text-[#737366]">Expires 12/25</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection