@extends('layouts.customer')

@section('title', 'Your Orders - DistroZone')

@section('content')
<div class="min-h-screen bg-[#FAFAF8] py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-[#737366] mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#F8F803]">Home</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('customer.profile') }}" class="hover:text-[#F8F803]">Account</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-[#1A1A1A] font-medium">Orders</span>
        </nav>

        {{-- Page Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#1A1A1A] mb-2">Your Orders</h1>
                <p class="text-[#737366]">Track pending shipments and review your purchase history.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <select class="px-4 py-2 bg-white border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] cursor-pointer">
                    <option>Filter by Status</option>
                    <option>All Orders</option>
                    <option>Pending Payment</option>
                    <option>Processing</option>
                    <option>Shipped</option>
                    <option>Delivered</option>
                </select>

                <select class="px-4 py-2 bg-white border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] cursor-pointer">
                    <option>Sort by Date</option>
                    <option>Newest First</option>
                    <option>Oldest First</option>
                </select>
            </div>
        </div>

        {{-- Orders Table --}}
        <div class="bg-white rounded-lg shadow-sm border border-[#E8E8E3] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-[#FAFAF8] border-b border-[#E8E8E3]">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#737366] uppercase tracking-wider">
                                Order ID
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#737366] uppercase tracking-wider">
                                Date Placed
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#737366] uppercase tracking-wider">
                                Items
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#737366] uppercase tracking-wider">
                                Total
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#737366] uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-[#737366] uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E8E8E3]">
                        {{-- Order Row 1 --}}
                        <tr class="hover:bg-[#FAFAF8] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-semibold text-[#1A1A1A]">#1024</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-[#737366]">
                                Sept 12, 2023
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="flex -space-x-2">
                                        <img src="https://placehold.co/40x40/F8F803/1A1A1A?text=T" class="w-10 h-10 rounded-lg border-2 border-white" alt="Product">
                                        <img src="https://placehold.co/40x40/1A1A1A/F8F803?text=T" class="w-10 h-10 rounded-lg border-2 border-white" alt="Product">
                                    </div>
                                    <span class="text-sm text-[#737366]">+1</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-[#1A1A1A]">
                                Rp125.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-[#F8F803] text-[#1A1A1A]">
                                    <span class="w-1.5 h-1.5 bg-[#1A1A1A] rounded-full"></span>
                                    Processing
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('customer.orders.show', 1024) }}" 
                                   class="inline-flex items-center gap-2 text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>

                        {{-- Order Row 2 --}}
                        <tr class="hover:bg-[#FAFAF8] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-semibold text-[#1A1A1A]">#1023</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-[#737366]">
                                Aug 05, 2023
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-[#737366]">1 Item</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-[#1A1A1A]">
                                Rp45.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-[#1A1A1A] text-white">
                                    Shipped
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('customer.orders.show', 1023) }}" 
                                   class="inline-flex items-center gap-2 text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>

                        {{-- Order Row 3 --}}
                        <tr class="hover:bg-[#FAFAF8] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-semibold text-[#1A1A1A]">#1022</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-[#737366]">
                                Jul 22, 2023
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-[#737366]">2 Items</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-[#1A1A1A]">
                                Rp80.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-[#E8E8E3] text-[#737366]">
                                    Delivered
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('customer.orders.show', 1022) }}" 
                                   class="inline-flex items-center gap-2 text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>

                        {{-- Order Row 4 --}}
                        <tr class="hover:bg-[#FAFAF8] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-semibold text-[#1A1A1A]">#1021</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-[#737366]">
                                Jun 10, 2023
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-[#737366]">1 Item</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-[#1A1A1A]">
                                Rp35.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-[#E8E8E3] text-[#737366]">
                                    Returned
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('customer.orders.show', 1021) }}" 
                                   class="inline-flex items-center gap-2 text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>

                        {{-- Order Row 5 --}}
                        <tr class="hover:bg-[#FAFAF8] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-semibold text-[#1A1A1A]">#1020</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-[#737366]">
                                May 24, 2023
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-[#737366]">4 Items</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-[#1A1A1A]">
                                Rp210.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-[#E8E8E3] text-[#737366]">
                                    Delivered
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('customer.orders.show', 1020) }}" 
                                   class="inline-flex items-center gap-2 text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-between px-6 py-4 bg-[#FAFAF8] border-t border-[#E8E8E3]">
                <p class="text-sm text-[#737366]">
                    Showing <span class="font-medium">1-5</span> of <span class="font-medium">24</span> orders
                </p>
                
                <div class="flex gap-2">
                    <button class="px-4 py-2 text-sm text-[#737366] bg-white border border-[#E8E8E3] rounded-lg hover:bg-[#F5F5F0] transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        Previous
                    </button>
                    <button class="px-4 py-2 text-sm text-[#1A1A1A] bg-[#F8F803] border border-[#F8F803] rounded-lg font-medium hover:bg-[#E8E803] transition-colors">
                        Next
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection