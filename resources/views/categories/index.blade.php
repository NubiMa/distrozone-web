{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Shop by Category')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-4 py-12">
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Shop by Category</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Explore our curated collections of premium streetwear essentials, 
                from graphic tees to oversized fits.
            </p>
        </div>

        {{-- Category Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                   class="group block bg-gray-50 rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    
                    {{-- Category Image --}}
                    <div class="aspect-[4/3] bg-gray-200 relative overflow-hidden">
                        <img 
                            src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=450&fit=crop" 
                            alt="{{ $category->name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        
                        {{-- Category Name Overlay --}}
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white mb-1">
                                {{ $category->name }}
                            </h3>
                            <p class="text-gray-200 text-sm">
                                {{ $category->products_count }} products
                            </p>
                        </div>
                    </div>

                    {{-- Category Description --}}
                    <div class="p-6">
                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($category->description, 100) }}
                        </p>
                        <span class="inline-flex items-center text-gray-900 font-medium group-hover:text-yellow-600 transition-colors">
                            Shop Now
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-16">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">No categories available</h3>
                    <p class="text-gray-600">Check back soon for new collections</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection