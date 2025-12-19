@extends('layouts.customer')

@section('title', 'Confirm Your Payment - DistroZone')

@section('content')
<div class="min-h-screen bg-[#FAFAF8] py-12">
    <div class="container mx-auto px-4 max-w-2xl">
        
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-[#737366] mb-8">
            <a href="{{ route('home') }}" class="hover:text-[#F8F803]">Home</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('customer.orders') }}" class="hover:text-[#F8F803]">Orders</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-[#1A1A1A] font-medium">Payment Verification</span>
        </nav>

        {{-- Page Header --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#1A1A1A] mb-3">Confirm Your Payment</h1>
            <p class="text-[#737366]">Please upload a screenshot or photo of your transfer receipt to process your order <span class="font-semibold text-[#1A1A1A]">#12345</span>.</p>
        </div>

        {{-- Main Form --}}
        <div class="bg-white rounded-lg p-8 shadow-sm border border-[#E8E8E3]">
            <form method="POST" action="{{ route('payment.verify') }}" enctype="multipart/form-data">
                @csrf

                {{-- Order Number --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-[#1A1A1A] mb-2">
                        Order Number <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#737366] font-medium">#</span>
                        <input type="text" 
                               name="order_number" 
                               value="12345"
                               class="w-full pl-8 pr-12 py-3 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent"
                               readonly>
                        <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="mt-2 text-sm text-[#F8F803]">This order number is automatically linked from your order history.</p>
                </div>

                {{-- Payment Receipt Upload --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-[#1A1A1A] mb-2">
                        Payment Receipt <span class="text-red-500">*</span>
                    </label>
                    
                    <div class="border-2 border-dashed border-[#E8E8E3] rounded-lg p-8 text-center hover:border-[#F8F803] transition-colors cursor-pointer"
                         id="dropzone">
                        <input type="file" 
                               name="payment_proof" 
                               id="fileInput"
                               class="hidden"
                               accept="image/svg+xml,image/png,image/jpeg,image/jpg,image/gif"
                               required>
                        
                        <label for="fileInput" class="cursor-pointer">
                            <div class="w-16 h-16 rounded-full bg-[#FFF9E6] flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-[#F8F803]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                            </div>
                            <h3 class="text-[#1A1A1A] font-semibold mb-1">Click to upload or drag and drop</h3>
                            <p class="text-sm text-[#737366] mb-4">SVG, PNG, JPG or GIF (max. 2MB)</p>
                            <button type="button" 
                                    class="px-6 py-2 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg text-[#1A1A1A] font-medium hover:bg-[#F5F5F0] transition-colors"
                                    onclick="document.getElementById('fileInput').click()">
                                Browse Files
                            </button>
                        </label>

                        {{-- Preview Area (Hidden by default) --}}
                        <div id="previewArea" class="hidden mt-4">
                            <img id="imagePreview" class="max-w-full h-auto rounded-lg" alt="Preview">
                            <button type="button" 
                                    class="mt-3 text-sm text-red-600 hover:underline"
                                    onclick="removeFile()">
                                Remove file
                            </button>
                        </div>
                    </div>

                    @error('payment_proof')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Additional Notes --}}
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-semibold text-[#1A1A1A]">
                            Additional Notes
                        </label>
                        <span class="text-xs text-[#F8F803]">(Optional)</span>
                    </div>
                    <textarea name="notes" 
                              rows="4"
                              class="w-full px-4 py-3 bg-[#FAFAF8] border border-[#E8E8E3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F8F803] focus:border-transparent resize-none"
                              placeholder="Enter transaction ID or any other details here..."></textarea>
                </div>

                {{-- Submit Button --}}
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 px-6 py-4 bg-[#F8F803] text-[#1A1A1A] font-bold rounded-lg hover:bg-[#E8E803] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Upload Proof
                </button>

                <p class="mt-4 text-center text-sm text-[#737366]">
                    By clicking upload, you agree to our 
                    <a href="#" class="text-[#F8F803] hover:underline">Terms of Service</a>.
                </p>
            </form>
        </div>

        {{-- Help Section --}}
        <div class="mt-6 flex items-center justify-center gap-2 text-sm text-[#737366]">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
            </svg>
            <span>Need help with your order? <a href="#" class="text-[#F8F803] hover:underline">Contact Support</a></span>
        </div>

    </div>
</div>

{{-- File Upload Script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('fileInput');
    const dropzone = document.getElementById('dropzone');
    const previewArea = document.getElementById('previewArea');
    const imagePreview = document.getElementById('imagePreview');

    // Handle file selection
    fileInput.addEventListener('change', function(e) {
        handleFile(e.target.files[0]);
    });

    // Handle drag and drop
    dropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropzone.classList.add('border-[#F8F803]', 'bg-[#FFF9E6]');
    });

    dropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropzone.classList.remove('border-[#F8F803]', 'bg-[#FFF9E6]');
    });

    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropzone.classList.remove('border-[#F8F803]', 'bg-[#FFF9E6]');
        handleFile(e.dataTransfer.files[0]);
    });

    function handleFile(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewArea.classList.remove('hidden');
                dropzone.querySelector('label').classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    window.removeFile = function() {
        fileInput.value = '';
        imagePreview.src = '';
        previewArea.classList.add('hidden');
        dropzone.querySelector('label').classList.remove('hidden');
    };
});
</script>
@endsection