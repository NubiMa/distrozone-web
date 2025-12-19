@props([
    'product',
    'showQuickView' => false
])

<div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200">
    {{-- Product Image --}}
    <a href="{{ route('products.show', $product->slug) }}" class="block relative aspect-square bg-gray-100">
        @if($product->primaryImage)
            <img 
                src="{{ Storage::url($product->primaryImage->image_path) }}" 
                alt="{{ $product->primaryImage->alt_text ?? $product->name }}"
                class="w-full h-full object-cover"
            >
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-400">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif

        {{-- Badges --}}
        @if($product->is_featured)
            <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                Featured
            </span>
        @endif

        @if(!$product->isInStock())
            <span class="absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded">
                Out of Stock
            </span>
        @endif
    </a>

    {{-- Product Info --}}
    <div class="p-4">
        <a href="{{ route('products.show', $product->slug) }}" class="block mb-2">
            <h3 class="font-medium text-gray-900 hover:text-blue-600 transition-colors line-clamp-2">
                {{ $product->name }}
            </h3>
        </a>

        {{-- Category --}}
        <p class="text-xs text-gray-500 mb-2">
            {{ $product->category->name }}
        </p>

        {{-- Price --}}
        <div class="mb-3">
            @if($product->getLowestPrice() !== $product->getHighestPrice())
                <p class="text-sm text-gray-600">
                    Rp {{ number_format($product->getLowestPrice(), 0, ',', '.') }} - 
                    Rp {{ number_format($product->getHighestPrice(), 0, ',', '.') }}
                </p>
            @else
                <p class="text-lg font-semibold text-gray-900">
                    Rp {{ number_format($product->base_price, 0, ',', '.') }}
                </p>
            @endif
        </div>

        {{-- Stock Info --}}
        <p class="text-xs text-gray-500 mb-3">
            {{ $product->getTotalStock() }} items available
        </p>

        {{-- Actions --}}
        <a 
            href="{{ route('products.show', $product->slug) }}" 
            class="block w-full text-center bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 transition-colors text-sm"
        >
            View Details
        </a>
    </div>
</div>