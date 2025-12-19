{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Shop Men\'s T-Shirts')

@section('content')
<div class="bg-white">
    {{-- Breadcrumb --}}
    <div class="border-b border-gray-200">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-gray-900 transition-colors">Home</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900">T-Shirts</span>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-4 gap-8">
            {{-- Sidebar Filters --}}
            <aside class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-lg p-6 sticky top-24">
                    <h2 class="font-bold text-gray-900 mb-6">Filters</h2>

                    {{-- Collections --}}
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-900 mb-3">COLLECTIONS</h3>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="collection" value="all" checked class="w-4 h-4 text-yellow-400 focus:ring-yellow-400">
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-gray-900">All T-Shirts</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="collection" value="graphic" class="w-4 h-4 text-yellow-400 focus:ring-yellow-400">
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-gray-900">Graphic Tees</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="collection" value="oversized" class="w-4 h-4 text-yellow-400 focus:ring-yellow-400">
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-gray-900">Oversized</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="collection" value="basics" class="w-4 h-4 text-yellow-400 focus:ring-yellow-400">
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-gray-900">Basics</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="collection" value="vintage" class="w-4 h-4 text-yellow-400 focus:ring-yellow-400">
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-gray-900">Vintage Wash</span>
                            </label>
                        </div>
                    </div>

                    {{-- Size Filter --}}
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-900 mb-3">SIZE</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                                <button class="px-3 py-2 border-2 border-gray-300 rounded text-sm font-medium hover:border-yellow-400 hover:bg-yellow-50 transition-colors focus:border-yellow-400 focus:bg-yellow-400 focus:text-gray-900">
                                    {{ $size }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Price Range --}}
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-900 mb-3">PRICE RANGE</h3>
                        <div class="space-y-3">
                            <input type="range" min="0" max="1000000" step="10000" class="w-full accent-yellow-400">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Rp0</span>
                                <span>Rp1.000.000</span>
                            </div>
                        </div>
                    </div>

                    <button class="w-full bg-gray-900 text-white py-2 rounded-lg hover:bg-gray-800 transition-colors">
                        Apply Filters
                    </button>
                </div>
            </aside>

            {{-- Product Grid --}}
            <main class="lg:col-span-3">
                {{-- Header --}}
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">MEN'S T-SHIRTS</h1>
                        <p class="text-gray-600 mt-1">{{ $products->total() }} products found</p>
                    </div>

                    <div class="flex items-center space-x-2">
                        <label class="text-sm text-gray-600">Sort By:</label>
                        <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="featured">Featured</option>
                            <option value="newest">Newest</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                        </select>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                    @forelse($products as $product)
                        <div class="group transform hover:-translate-y-2 transition-all duration-300">
                            <x-product-card :product="$product" />
                        </div>
                    @empty
                        <div class="col-span-full text-center py-16">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <h3 class="text-xl font-medium text-gray-900 mb-2">No products found</h3>
                            <p class="text-gray-600">Try adjusting your filters</p>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                @if($products->hasPages())
                    <div class="flex justify-center">
                        <nav class="flex items-center space-x-2">
                            {{ $products->links() }}
                        </nav>
                    </div>
                @endif

                {{-- Load More Button --}}
                @if($products->hasMorePages())
                    <div class="text-center mt-8">
                        <button class="inline-flex items-center space-x-2 px-6 py-3 border-2 border-gray-900 text-gray-900 font-medium rounded-lg hover:bg-gray-900 hover:text-white transition-colors">
                            <span>Load More Products</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                    </div>
                @endif
            </main>
        </div>
    </div>
</div>
@endsection