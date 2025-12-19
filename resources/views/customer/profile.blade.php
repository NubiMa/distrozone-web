@extends('layouts.customer')

@section('title', 'My Profile - DistroZone')

@section('content')
<div class="min-h-screen bg-[#FAFAF8] py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    {{-- User Info --}}
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-[#F8F803] mx-auto mb-3 flex items-center justify-center">
                            <span class="text-2xl font-semibold text-[#1A1A1A]">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <h3 class="font-semibold text-lg text-[#1A1A1A]">{{ auth()->user()->name }}</h3>
                        <p class="text-sm text-[#737366]">Gold Member</p>
                    </div>

                    {{-- Menu --}}
                    <nav class="space-y-1">
                        <a href="{{ route('customer.profile') }}" 
                           class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#F8F803] text-[#1A1A1A] font-medium">
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
                           class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#737366] hover:bg-[#F5F5F0] transition-colors">
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
            <div class="lg:col-span-3 space-y-6">
                
                {{-- Page Header --}}
                <div>
                    <h1 class="text-3xl font-bold text-[#1A1A1A] mb-2">My Profile</h1>
                    <p class="text-[#737366]">Manage your account details, preferences, and security settings.</p>
                </div>

                {{-- Success Message --}}
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
                @endif

                {{-- Personal Information --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-[#F8F803] flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-[#1A1A1A]">Personal Information</h2>
                    </div>

                    <form method="POST" action="{{ route('customer.profile.update') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-[#1A1A1A] mb-2">Full Name</label>
                                <input type="text" 
                                       name="name" 
                                       value="{{ old('name', auth()->user()->name) }}"
                                       class="w-full px-4 py-3 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent"
                                       required>
                                @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-[#1A1A1A] mb-2">Phone Number</label>
                                <input type="tel" 
                                       name="phone" 
                                       value="{{ old('phone', auth()->user()->phone) }}"
                                       class="w-full px-4 py-3 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent">
                                @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#1A1A1A] mb-2">Email Address</label>
                            <div class="relative">
                                <input type="email" 
                                       value="{{ auth()->user()->email }}"
                                       class="w-full px-4 py-3 bg-[#F5F5F0] border border-[#E8E8E3] rounded-lg text-[#737366]"
                                       disabled>
                                <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-1 text-green-600 text-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Verified
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" 
                                    class="px-6 py-3 bg-[#F8F803] text-[#1A1A1A] font-semibold rounded-lg hover:bg-[#E8E803] transition-colors">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Security Settings --}}
                <div class="bg-white rounded-lg p-6 shadow-sm border border-[#E8E8E3]">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-[#F8F803] flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-[#1A1A1A]">Security</h2>
                    </div>

                    <form method="POST" action="{{ route('customer.password.update') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-[#1A1A1A] mb-2">Current Password</label>
                            <input type="password" 
                                   name="current_password"
                                   class="w-full px-4 py-3 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent"
                                   required>
                            @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-[#1A1A1A] mb-2">New Password</label>
                                <input type="password" 
                                       name="new_password"
                                       class="w-full px-4 py-3 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent"
                                       required>
                                @error('new_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-[#1A1A1A] mb-2">Confirm Password</label>
                                <input type="password" 
                                       name="new_password_confirmation"
                                       class="w-full px-4 py-3 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent"
                                       required>
                            </div>
                        </div>

                        <div class="flex justify-between items-center pt-4">
                            <a href="#" class="text-sm text-[#F8F803] hover:underline">Forgot your password?</a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-[#F8F803] text-[#1A1A1A] font-semibold rounded-lg hover:bg-[#E8E803] transition-colors">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection