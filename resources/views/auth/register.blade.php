{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Your Account')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
            {{-- Left Side - Image --}}
            <div class="hidden lg:block">
                <div class="bg-gray-900 rounded-2xl overflow-hidden shadow-2xl h-full min-h-[600px] relative">
                    <img 
                        src="https://images.unsplash.com/photo-1622445275463-afa2ab738c34?w=800&h=1000&fit=crop" 
                        alt="Streetwear model"
                        class="w-full h-full object-cover opacity-90"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    
                    {{-- Logo Overlay --}}
                    <div class="absolute top-8 left-8 flex items-center space-x-2">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                            <span class="text-gray-900 font-bold">DZ</span>
                        </div>
                        <span class="text-white text-xl font-bold">DistroZone</span>
                    </div>
                </div>
            </div>

            {{-- Right Side - Form --}}
            <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-10 animate-slide-in">
                {{-- Header --}}
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Join the Zone</h2>
                    <p class="mt-2 text-sm text-yellow-600">
                        Create your account to get exclusive access to the latest drops and limited editions.
                    </p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
                            Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}"
                            required 
                            autofocus
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all @error('name') border-red-500 @enderror"
                            placeholder="Enter your full name"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                            Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                            placeholder="Enter your email address"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-900 mb-2">
                            Phone Number <span class="text-gray-500">(Optional)</span>
                        </label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone" 
                            value="{{ old('phone') }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all @error('phone') border-red-500 @enderror"
                            placeholder="08123456789"
                        >
                        @error('phone')
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
                                placeholder="Create a password"
                            >
                            <button 
                                type="button"
                                onclick="togglePasswordField('password')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-2">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all"
                                placeholder="Confirm your password"
                            >
                            <button 
                                type="button"
                                onclick="togglePasswordField('password_confirmation')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button 
                        type="submit"
                        class="w-full bg-yellow-400 text-gray-900 font-bold py-3 rounded-xl hover:bg-yellow-300 transition-all transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-200 flex items-center justify-center space-x-2"
                    >
                        <span>Register</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>

                    {{-- Divider --}}
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    {{-- Google Sign In --}}
                    <button 
                        type="button"
                        class="w-full flex items-center justify-center space-x-3 px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors"
                    >
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span class="text-gray-700 font-medium">Google</span>
                    </button>

                    {{-- Login Link --}}
                    <p class="text-center text-sm text-gray-600 pt-4">
                        <span class="text-yellow-600">Already a member?</span>
                        <a href="{{ route('login') }}" class="font-bold text-gray-900 hover:text-yellow-600 transition-colors ml-1">
                            Login
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePasswordField(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === 'password' ? 'text' : 'password';
}
</script>

<style>
@keyframes slideIn {
    from { opacity: 0; transform: translateX(30px); }
    to { opacity: 1; transform: translateX(0); }
}

.animate-slide-in {
    animation: slideIn 0.6s ease-out;
}
</style>
@endsection