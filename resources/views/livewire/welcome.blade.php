<main class="min-h-[90vh] bg-gradient-to-tr from-zinc-600 to-zinc-900 flex items-center justify-center flex-col">
    @auth
        <div class="text-white">
            <h3 class="font-bold text-5xl">
                Welcome {{ auth()->user()->name }},
            </h3>
            <p class="text-sm py-5">Thanks for Trying out this!</p>
        </div>
    @else
        <div class="text-white">
            <h3 class="font-bold text-5xl">Share your social links & more ...</h3>
            <form action="/signup" class="grid gap-2 mt-6">
                <label for="username">Claim your Free Account</label>
                <div class="border px-6 py-4 bg-white text-black text-2xl">
                    <span class="text-zinc-400 tracking-wide">{{ env('APP_URL') }}/</span>
                    <input id="username" name="username" class="focus:outline-none caret-black" type="text" autofocus
                        required />
                </div>
                <div>
                    <button class="bg-black px-10 py-3">Get Started</button>
                </div>
            </form>
        </div>
    @endauth
</main>
