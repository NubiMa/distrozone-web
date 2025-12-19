{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Streetwear T-Shirts for Modern Urban Aesthetics')

@section('content')
{{-- Hero Section --}}
<section class="bg-gradient-to-br from-gray-50 to-gray-100 py-16 md:py-24">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="space-y-6 animate-fade-in">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
                    Redefine Your<br>
                    <span class="text-gray-700">Street Style.</span>
                </h1>
                
                <p class="text-lg text-gray-600 max-w-md">
                    Premium cuts. Limited drops. The new standard for modern urban aesthetics.
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <x-button 
                        variant="primary" 
                        size="lg" 
                        href="{{ route('products.index') }}"
                        class="transform hover:scale-105 transition-transform"
                    >
                        Shop the Drop
                    </x-button>
                    
                    <x-button 
                        variant="outline" 
                        size="lg" 
                        href="{{ route('products.index', ['featured' => 1]) }}"
                        class="transform hover:scale-105 transition-transform"
                    >
                        View Lookbook
                    </x-button>
                </div>
            </div>

            {{-- Right Image --}}
            <div class="relative animate-slide-up">
                <div class="bg-gray-800 rounded-2xl overflow-hidden shadow-2xl">
                    <img 
                        src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=800&h=600&fit=crop" 
                        alt="Urban streetwear collection" 
                        class="w-full h-auto object-cover"
                    >
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-white text-gray-900 text-sm font-medium px-4 py-2 rounded-full">
                            NEW COLLECTION
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Brand Banner --}}
<section class="bg-white py-8 border-y border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center overflow-x-auto space-x-8 md:space-x-12">
            @foreach(['STÜSSY', 'SUPREME', 'OFF-WHITE', 'FEAR OF GOD', 'PALACE', 'KITH'] as $brand)
                <span class="text-gray-400 font-bold text-sm md:text-base whitespace-nowrap hover:text-gray-600 transition-colors cursor-pointer">
                    {{ $brand }}
                </span>
            @endforeach
        </div>
    </div>
</section>

{{-- Featured Products Section --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                    Fresh Off the Press
                </h2>
                <p class="text-gray-600">Exclusive drops updated weekly.</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-gray-900 font-medium hover:text-gray-700 transition-colors">
                View All Products →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
                <div class="transform hover:-translate-y-2 transition-all duration-300">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Philosophy Section --}}
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <span class="inline-block bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded">
                OUR PHILOSOPHY
            </span>
            
            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
                "We don't just sell clothes. We curate the 
                <span class="bg-yellow-300 px-2">uniform</span> 
                for the modern creative."
            </h2>

            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                DistroZone was born from the streets and built for the gallery. We source premium 
                heavy-weight cottons and collaborate with underground artists to bring you 
                limited drops that stand out in a sea of fast fashion.
            </p>

            {{-- Features --}}
            <div class="grid md:grid-cols-3 gap-8 pt-8">
                <div class="space-y-3">
                    <div class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Premium Quality</h3>
                    <p class="text-sm text-gray-600">Heavyweight fabrics that last.</p>
                </div>

                <div class="space-y-3">
                    <div class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Global Shipping</h3>
                    <p class="text-sm text-gray-600">Wherever you are, we deliver.</p>
                </div>

                <div class="space-y-3">
                    <div class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Authentic Gear</h3>
                    <p class="text-sm text-gray-600">100% original designs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Newsletter Section --}}
<section class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center space-y-6">
            <h2 class="text-3xl md:text-4xl font-bold">
                Don't Miss the Drop.
            </h2>
            <p class="text-gray-400">
                Join the DistroZone inner circle. Get early access to new collections and exclusive discounts.
            </p>

            <form action="#" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto pt-4">
                @csrf
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    required
                    class="flex-1 px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white placeholder-gray-500"
                >
                <button 
                    type="submit"
                    class="bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition-colors"
                >
                    Subscribe
                </button>
            </form>

            <p class="text-xs text-gray-500">
                By subscribing you agree to our Privacy Policy.
            </p>
        </div>
    </div>
</section>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

.animate-slide-up {
    animation: slideUp 1s ease-out;
}
</style>
@endsection