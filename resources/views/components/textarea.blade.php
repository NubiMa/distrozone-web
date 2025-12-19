@props([
    'label' => null,
    'name' => null,
    'required' => false,
    'error' => null,
    'rows' => 4
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

    <textarea 
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        {{ $attributes->merge([
            'class' => 'w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent ' . 
                      ($error ? 'border-red-500' : 'border-gray-300')
        ]) }}
        @if($required) required @endif
    >{{ $slot }}</textarea>

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>