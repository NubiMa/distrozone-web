{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        {{-- Breadcrumb --}}
        <nav class="flex text-sm text-gray-600 mb-6">
            <a href="{{ route('home') }}" class="hover:text-gray-900 transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-gray-900 transition-colors">Products</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $product->name }}</span>
        </nav>

        <div class="grid lg:grid-cols-2 gap-12 bg-white rounded-lg p-8">
            {{-- Product Images --}}
            <div class="space-y-4">
                {{-- Main Image --}}
                <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                    @if($product->primaryImage)
                        <img 
                            id="mainImage"
                            src="{{ Storage::url($product->primaryImage->image_path) }}" 
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover"
                        >
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Thumbnail Gallery --}}
                @if($product->images->count() > 1)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($product->images as $image)
                            <button 
                                onclick="changeMainImage('{{ Storage::url($image->image_path) }}')"
                                class="aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-transparent hover:border-yellow-400 transition-colors"
                            >
                                <img 
                                    src="{{ Storage::url($image->image_path) }}" 
                                    alt="{{ $image->alt_text }}"
                                    class="w-full h-full object-cover"
                                >
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Product Info --}}
            <div class="space-y-6">
                {{-- Product Name & Rating --}}
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        {{ $product->name }}
                    </h1>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <span class="text-yellow-400 text-lg">★★★★★</span>
                            <span class="text-sm text-gray-600 ml-2">4.8 (124 reviews)</span>
                        </div>
                        <button class="text-gray-400 hover:text-red-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Price --}}
                <div class="border-t border-b border-gray-200 py-4">
                    <p class="text-3xl font-bold text-gray-900">
                        Rp{{ number_format($product->base_price, 0, ',', '.') }}
                    </p>
                </div>

                {{-- Color Selection --}}
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="font-medium text-gray-900">COLOR: <span id="selectedColor">Midnight Black</span></h3>
                    </div>
                    <div class="flex space-x-3">
                        @php
                            $colors = $product->variants->pluck('color')->unique();
                        @endphp
                        @foreach($colors as $color)
                            <button class="w-10 h-10 rounded-full border-2 border-gray-300 hover:border-yellow-400 transition-colors focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400"
                                    style="background-color: {{ strtolower($color) === 'black' ? '#000' : (strtolower($color) === 'white' ? '#fff' : '#666') }}">
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Size Selection --}}
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="font-medium text-gray-900">SIZE</h3>
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-900 underline">Size Guide</a>
                    </div>
                    <div class="grid grid-cols-6 gap-3">
                        @php
                            $sizes = $product->variants->pluck('size')->unique();
                        @endphp
                        @foreach($sizes as $size)
                            <button class="px-4 py-3 border-2 border-gray-300 rounded-lg text-sm font-medium hover:border-yellow-400 transition-colors focus:border-yellow-400 focus:bg-yellow-400 focus:text-gray-900">
                                {{ $size }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Quantity --}}
                <div class="flex items-center space-x-4">
                    <button class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 transition-colors">
                        <span class="text-xl">−</span>
                    </button>
                    <input type="number" value="1" min="1" class="w-16 text-center border border-gray-300 rounded-lg py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 transition-colors">
                        <span class="text-xl">+</span>
                    </button>
                </div>

                {{-- Add to Cart Button --}}
                @auth
                    <button class="w-full bg-yellow-400 text-gray-900 font-bold py-4 rounded-lg hover:bg-yellow-300 transition-all transform hover:scale-105">
                        ADD TO CART
                    </button>
                @else
                    <button onclick="window.location.href='{{ route('login') }}'" class="w-full bg-gray-200 text-gray-700 font-bold py-4 rounded-lg hover:bg-gray-300 transition-colors">
                        Login to Add to Cart
                    </button>
                @endauth

                {{-- Product Details Accordion --}}
                <div class="space-y-3 pt-6 border-t border-gray-200">
                    <details class="group">
                        <summary class="flex justify-between items-center cursor-pointer font-medium text-gray-900 py-3">
                            <span>Description</span>
                            <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="text-gray-600 text-sm pb-3">
                            {{ $product->description ?: 'The Urban Glitch Oversized Tee features a heavyweight cotton construction with a boxy fit. Inspired by digital distortion and brutalist architecture, this piece combines comfort with a striking visual statement. Pre-shrunk to minimize shrinkage.' }}
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex justify-between items-center cursor-pointer font-medium text-gray-900 py-3 border-t border-gray-200">
                            <span>Fabric & Care</span>
                            <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="text-gray-600 text-sm pb-3">
                            <ul class="list-disc list-inside space-y-1">
                                <li>100% premium heavyweight cotton</li>
                                <li>Machine wash cold</li>
                                <li>Tumble dry low</li>
                                <li>Do not bleach</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex justify-between items-center cursor-pointer font-medium text-gray-900 py-3 border-t border-gray-200">
                            <span>Shipping & Returns</span>
                            <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="text-gray-600 text-sm pb-3">
                            <p>Free shipping on orders above Rp500.000 within Java. Standard delivery 3-5 business days. 30-day return policy for unworn items.</p>
                        </div>
                    </details>
                </div>
            </div>
        </div>

        {{-- You Might Also Like Section --}}
        <section class="mt-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">You Might Also Like</h2>
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">
                    View All →
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <div class="transform hover:-translate-y-2 transition-all duration-300">
                        <x-product-card :product="$related" />
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Reviews Section --}}
        <section class="mt-16 bg-white rounded-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Reviews</h2>
            
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div class="md:col-span-1 text-center">
                    <div class="text-5xl font-bold text-gray-900 mb-2">4.8</div>
                    <div class="text-yellow-400 text-2xl mb-2">★★★★★</div>
                    <p class="text-sm text-gray-600">Based on 124 reviews</p>
                </div>

                <div class="md:col-span-2 space-y-2">
                    @foreach([5 => 78, 4 => 15, 3 => 4, 2 => 1, 1 => 2] as $star => $percent)
                        <div class="flex items-center space-x-3">
                            <span class="text-sm text-gray-600 w-4">{{ $star }}</span>
                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $percent }}%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8">{{ $percent }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>

<script>
function changeMainImage(url) {
    document.getElementById('mainImage').src = url;
}
</script>
@endsection