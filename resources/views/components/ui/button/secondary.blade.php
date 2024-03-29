@props(['class' => '', 'type' => 'button'])

<button
    class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 rounded-md px-3 text-xs {{ $class }}"
    type="{{ $type }}" {{ $attributes }}>{{ $slot }}</button>
