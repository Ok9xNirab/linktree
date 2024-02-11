@props([
    'name' => '',
    'label' => '',
])

<div class="flex items-center gap-1.5">
    <input {{ $attributes }} id="{{ $name }}" type="checkbox"
        class="w-4 h-4 text-zinc-800 bg-gray-100 border-gray-300 rounded accent-zinc-800 focus:outline-transparent">
    <label for="{{ $name }}" class="text-sm font-medium text-gray-900">
        {{ $label }}
    </label>
</div>
