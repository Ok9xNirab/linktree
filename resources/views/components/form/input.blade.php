@props(['name', 'label', 'type' => 'text'])

<div class="grid gap-1.5">
    <label class="font-medium text-zinc-800" for="{{ $name }}">
        {{ $label }}
    </label>
    <div>
        <input id="{{ $name }}"
            class="w-full border rounded-md text-sm text-zinc-600 px-3 py-1.5 focus:ring-zinc-800 focus:outline-transparent focus:ring-2"
            type="{{ $type }}" name="{{ $name }}" {{ $attributes }} />
        {{ $slot }}
    </div>
</div>
