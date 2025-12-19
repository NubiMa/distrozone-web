@props([
    'variant' => 'primary', // primary, secondary, danger, outline
    'size' => 'md', // sm, md, lg
    'type' => 'button',
    'href' => null
])

@php
$baseClasses = 'inline-flex items-center justify-center font-medium rounded transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';

$variantClasses = match($variant) {
    'primary' => 'bg-gray-900 text-white hover:bg-gray-800 focus:ring-gray-900',
    'secondary' => 'bg-gray-200 text-gray-900 hover:bg-gray-300 focus:ring-gray-500',
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-600',
    'outline' => 'border-2 border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white focus:ring-gray-900',
    default => 'bg-gray-900 text-white hover:bg-gray-800 focus:ring-gray-900',
};

$sizeClasses = match($size) {
    'sm' => 'px-3 py-1.5 text-sm',
    'lg' => 'px-6 py-3 text-lg',
    default => 'px-4 py-2 text-base',
};

$classes = "{$baseClasses} {$variantClasses} {$sizeClasses}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif