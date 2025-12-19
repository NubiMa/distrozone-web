{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login to Your Account')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-xl p-8 space-y-6 animate-fade-in">
            {{-- Header --}}
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Welcome Back</h2>
                <p class="mt-2 text-sm text-yellow-600">
                    Enter your credentials to access your stash.
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
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

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all @error('password') border-red-500 @enderror"
                            placeholder="••••••••"
                        >
                        <button 
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                        >
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember & Forgot --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            class="w-4 h-4 text-yellow-400 border-gray-300 rounded focus:ring-yellow-400"
                        >
                        <span class="ml-2 text-sm text-gray-700">Remember me</span>
                    </label>

                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-gray-900 hover:text-yellow-600 transition-colors">
                        Forgot Password?
                    </a>
                </div>

                {{-- Submit Button --}}
                <button 
                    type="submit"
                    class="w-full bg-yellow-400 text-gray-900 font-bold py-3 rounded-xl hover:bg-yellow-300 transition-all transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-200"
                >
                    LOGIN
                </button>

                {{-- Register Link --}}
                <p class="text-center text-sm text-gray-600">
                    <span class="text-yellow-600">New to DistroZone?</span>
                    <a href="{{ route('register') }}" class="font-bold text-gray-900 hover:text-yellow-600 transition-colors ml-1">
                        Create an Account
                    </a>
                </p>
            </form>
        </div>

        {{-- Back to Shop --}}
        <div class="text-center mt-6">
            <a href="{{ route('products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors inline-flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Continue Shopping
            </a>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        `;
    } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
    }
}
</script>

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