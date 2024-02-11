@props(['name' => ''])

<a {{ $attributes }}
    class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:text-accent-foreground h-9 px-4 py-2 {{ request()->routeIs($name) ? 'bg-zinc-100' : 'hover:underline' }} justify-start">{{ $slot }}</a>
