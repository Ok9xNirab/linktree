<main class="max-w-6xl mx-auto mb-20">
    <h3 class="text-5xl text-zinc-700 font-bold text-center my-14">Login</h3>

    <div class="bg-white border border-zinc-150 shadow-sm rounded-md p-8 max-w-lg mx-auto">
        <form method="POST" wire:submit="submit" class="grid gap-4">
            @csrf
            <x-form.input type="email" name="email" wire:model.live="email" label="Email" placeholder="user@test.com"
                required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </x-form.input>
            <x-form.input type="password" name="password" wire:model.live="password" label="Password"
                placeholder="******" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </x-form.input>
            <x-ui.button.primary type="submit" label="Login" wire:loading.attr="disabled" wire:target="submit" />
        </form>
    </div>
</main>
