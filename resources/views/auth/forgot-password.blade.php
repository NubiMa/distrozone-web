{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-xl p-8 space-y-6 animate-fade-in">
            {{-- Icon --}}
            <div class="flex justify-center">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
            </div>

            {{-- Header --}}
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Forgot Password?</h2>
                <p class="mt-2 text-sm text-gray-600">
                    No worries! Enter your email and we'll send you reset instructions.
                </p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <x-alert type="success">
                    {{ session('success') }}
                </x-alert>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                        Email Address
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        autofocus
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                        placeholder="user@example.com"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <button 
                    type="submit"
                    class="w-full bg-yellow-400 text-gray-900 font-bold py-3 rounded-xl hover:bg-yellow-300 transition-all transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-200"
                >
                    Send Reset Link
                </button>

                {{-- Back to Login --}}
                <div class="text-center pt-2">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors inline-flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}
</style>
@endsection