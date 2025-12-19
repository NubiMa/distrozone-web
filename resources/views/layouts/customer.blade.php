<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DistroZone')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-[#FAFAF8]">
    
    {{-- Navigation (Authenticated) --}}
    <nav class="bg-white border-b border-[#E8E8E3] sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                
                {{-- Logo & Main Nav --}}
                <div class="flex items-center gap-8">
                    {{-- Logo --}}
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-[#F8F803] flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-[#1A1A1A]">DistroZone</span>
                    </a>

                    {{-- Main Menu --}}
                    <div class="hidden md:flex items-center gap-6">
                        <a href="{{ route('shop') }}" class="text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                            Shop
                        </a>
                        <a href="{{ route('collections') }}" class="text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                            Collections
                        </a>
                        <a href="{{ route('about') }}" class="text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                            About
                        </a>
                        <a href="{{ route('journal') }}" class="text-[#1A1A1A] hover:text-[#F8F803] font-medium transition-colors">
                            Journal
                        </a>
                    </div>
                </div>

                {{-- Search & Actions --}}
                <div class="flex items-center gap-4">
                    {{-- Search --}}
                    <div class="hidden lg:block relative">
                        <input type="text" 
                               placeholder="Search products..." 
                               class="w-64 pl-10 pr-4 py-2 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent">
                        <svg class="w-5 h-5 text-[#737366] absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    {{-- Wishlist --}}
                    <a href="{{ route('wishlist') }}" 
                       class="relative p-2 text-[#1A1A1A] hover:text-[#F8F803] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </a>

                    {{-- Cart --}}
                    <a href="{{ route('cart') }}" 
                       class="relative p-2 text-[#1A1A1A] hover:text-[#F8F803] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        {{-- Badge --}}
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-[#F8F803] text-[#1A1A1A] text-xs font-bold rounded-full flex items-center justify-center">
                            2
                        </span>
                    </a>

                    {{-- Account Dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center gap-2 p-2 hover:bg-[#FAFAF8] rounded-lg transition-colors">
                            <div class="w-8 h-8 rounded-full bg-[#F8F803] flex items-center justify-center">
                                <span class="text-sm font-semibold text-[#1A1A1A]">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </span>
                            </div>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition
                             class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-[#E8E8E3] py-2">
                            
                            <div class="px-4 py-3 border-b border-[#E8E8E3]">
                                <p class="text-sm font-semibold text-[#1A1A1A]">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-[#737366]">{{ auth()->user()->email }}</p>
                            </div>

                            <a href="{{ route('customer.profile') }}" 
                               class="flex items-center gap-3 px-4 py-2 text-[#1A1A1A] hover:bg-[#FAFAF8] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                My Profile
                            </a>

                            <a href="{{ route('customer.orders') }}" 
                               class="flex items-center gap-3 px-4 py-2 text-[#1A1A1A] hover:bg-[#FAFAF8] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                My Orders
                            </a>

                            <a href="{{ route('customer.addresses') }}" 
                               class="flex items-center gap-3 px-4 py-2 text-[#1A1A1A] hover:bg-[#FAFAF8] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Addresses
                            </a>

                            <div class="border-t border-[#E8E8E3] my-2"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="w-full flex items-center gap-3 px-4 py-2 text-red-600 hover:bg-red-50 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Mobile Menu Toggle --}}
                    <button class="md:hidden p-2 text-[#1A1A1A]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-[#E8E8E3] mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-[#737366]">© 2024 DistroZone. All rights reserved.</p>
                <div class="flex gap-6 text-sm">
                    <a href="#" class="text-[#737366] hover:text-[#F8F803] transition-colors">Privacy Policy</a>
                    <a href="#" class="text-[#737366] hover:text-[#F8F803] transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Alpine.js for dropdown --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>