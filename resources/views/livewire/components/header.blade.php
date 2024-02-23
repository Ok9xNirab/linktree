<header class="border-b border-zinc-100">
    <div class="bg-white max-w-6xl mx-auto py-4 px-8 flex items-center justify-between">
        <div>
            <a href="/" wire:navigate>
                <h4 class="text-zinc-700 font-semibold text-3xl">LinkTree</h4>
            </a>
        </div>

        <div class="flex items-center gap-6 text-sm font-medium">
            @auth
                <a wire:navigate href="/profile">
                    <img class="rounded-full w-10 h-10 border-4 border-zinc-150"
                        src="{{ auth()->user()->getProfileImageURL(40) }}"
                        alt="profile image" />
                </a>
            @else
                <a wire:navigate href="/login">Login</a>
                <a wire:navigate class="btn-primary" href="/signup">Get
                    Started</a>
            @endauth
        </div>
    </div>
</header>
