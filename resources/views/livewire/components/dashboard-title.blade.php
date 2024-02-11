<div class="mx-8 my-8 pb-3 flex flex-col lg:flex-row gap-2 lg:items-center justify-between">
    <div>
        <h2 class="text-3xl font-bold tracking-tight text-zinc-800">
            {{ $title }}
        </h2>
        <p class="text-sm text-zinc-500 my-2">{{ $desc }}</p>
    </div>
    <div class="w-full lg:w-1/3 relative">
        <input value="{{ env('APP_URL') . '/' . auth()->user()->username }}" type="text"
            class="border bg-zinc-100 px-3 py-1 focus:outline-transparent w-full text-lg text-zinc-500 rounded-md"
            disabled />
        <div x-data="{
            link: '{{ env('APP_URL') . '/' . auth()->user()->username }}',
            copy() {
                Toaster.success('Link copied!');
                navigator.clipboard.writeText(this.link);
            }
        }" class="absolute right-1 top-1 bottom-1 flex items-center gap-2">
            <button type="button" x-on:click="copy" class="p-1 bg-zinc-800 text-white rounded-md">
                <x-svg.clipboard class="w-5 h-5" />
            </button>
            <a href="{{ env('APP_URL') . '/' . auth()->user()->username }}" target="_blank"
                class="p-1 border bg-white text-zinc-800 rounded-md">
                <x-svg.redirect class="w-5 h-5" />
            </a>
        </div>
    </div>
</div>
