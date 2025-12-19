@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'required' => false,
    'error' => null
])

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-red-600">*</span>
            @endif
        </label>
    @endif

    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent ' . 
                      ($error ? 'border-red-500' : 'border-gray-300')
        ]) }}
        @if($required) required @endif
    >

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>