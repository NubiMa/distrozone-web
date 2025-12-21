{{-- resources/views/layouts/customer.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DistroZone') }} - @yield('title', 'Streetwear T-Shirts')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    {{-- Header / Navigation --}}
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="py-4">
                <nav class="flex items-center justify-between">
                    {{-- Logo --}}
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                            <span class="text-gray-900 font-bold text-sm">DZ</span>
                        </div>
                        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900 hover:text-gray-700 transition-colors">
                            DistroZone
                        </a>
                    </div>

                    {{-- Main Navigation --}}
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 transition-colors font-medium">
                            Home
                        </a>
                        <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-gray-900 transition-colors font-medium">
                            Shop
                        </a>
                        <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-gray-900 transition-colors font-medium">
                            Categories
                        </a>
                        <a href="#" class="text-gray-700 hover:text-gray-900 transition-colors font-medium">
                            About
                        </a>
                    </div>

                    {{-- Right Side Actions - CHANGED FOR AUTHENTICATED CUSTOMER --}}
                    <div class="flex items-center space-x-4">
                        {{-- Search --}}
                        <button class="text-gray-600 hover:text-gray-900 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>

                        {{-- Wishlist Button (NEW) --}}
                        <a href="{{ route('customer.wishlist') }}" class="text-gray-600 hover:text-gray-900 transition-colors relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </a>

                        {{-- Cart Button (NEW) --}}
                        <a href="{{ route('customer.cart') }}" class="relative text-gray-600 hover:text-gray-900 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="absolute -top-2 -right-2 bg-yellow-400 text-gray-900 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                0
                            </span>
                        </a>

                        {{-- User Account Dropdown (NEW) --}}
                        <div class="relative group">
                            <button class="text-gray-600 hover:text-gray-900 transition-colors flex items-center space-x-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {{-- Dropdown Menu --}}
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <div class="px-4 py-2 border-b border-gray-200">
                                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                </div>

                                <a href="{{ route('customer.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    Dashboard
                                </a>
                                <a href="{{ route('customer.orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    My Orders
                                </a>
                                <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    Profile Settings
                                </a>

                                <div class="border-t border-gray-200 mt-2 pt-2">
                                    <form method="POST" action="{{ url('/api/v1/logout') }}">
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="container mx-auto px-4 mt-4">
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-start">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="flex-1">
                    {{ session('success') }}
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-3 flex-shrink-0 text-green-600 hover:text-green-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container mx-auto px-4 mt-4">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-start">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="flex-1">
                    {{ session('error') }}
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-3 flex-shrink-0 text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer (Same as Guest) --}}
    <footer class="bg-gray-900 text-white mt-auto">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                {{-- Brand --}}
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                            <span class="text-gray-900 font-bold text-sm">DZ</span>
                        </div>
                        <span class="text-xl font-bold">DistroZone</span>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Premium streetwear essentials curated for the modern urban explorer. Quality first, always.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Shop --}}
                <div>
                    <h3 class="font-bold mb-4">Shop</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition-colors">New Arrivals</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition-colors">Best Sellers</a></li>
                        <li><a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-white transition-colors">Categories</a></li>
                        <li><a href="{{ route('products.index', ['featured' => 1]) }}" class="text-gray-400 hover:text-white transition-colors">Sale</a></li>
                    </ul>
                </div>

                {{-- Support --}}
                <div>
                    <h3 class="font-bold mb-4">Support</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Shipping & Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Size Guide</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                {{-- Stay in the Loop --}}
                <div>
                    <h3 class="font-bold mb-4">Stay in the Loop</h3>
                    <form action="#" method="POST" class="space-y-3">
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="Enter your email" 
                            required
                            class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white text-sm placeholder-gray-500"
                        >
                        <button 
                            type="submit"
                            class="w-full bg-white text-gray-900 font-medium px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors text-sm"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-sm text-gray-400">
                    &copy; {{ date('Y') }} DistroZone. All rights reserved.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>