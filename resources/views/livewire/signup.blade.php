<main class="max-w-6xl mx-auto mb-20">
    <h3 class="text-5xl text-zinc-700 font-bold text-center my-14">Signup</h3>

    <div class="bg-white border border-zinc-150 shadow-sm rounded-md p-8 max-w-lg mx-auto">
        <form method="POST" wire:submit="submit" class="grid gap-4">
            @csrf
            <x-form.input name="username" label="Username" placeholder="Ok9xNirab" wire:model.live="username" required>
                @error('username')
                    <span class="error">{{ $message }}</span>
                @enderror
            </x-form.input>
            <x-form.input name="name" label="Name" wire:model.live="name" placeholder="Istiaq Nirab" required>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </x-form.input>
            <x-form.input type="email" name="email" wire:model.live="email" label="Email"
                placeholder="user@test.com" required>
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
            <x-form.input type="password" wire:model.live="password_confirmation" name="password_confirmation"
                label="Confirm Password" placeholder="******" required>
                @error('password_confirmation')
                    <span class="error">{{ $message }}</span>
                @enderror
            </x-form.input>
            <x-ui.button.primary type="submit" label="Create Account" wire:loading.attr="disabled"
                wire:target="submit" />
        </form>
    </div>
</main>
