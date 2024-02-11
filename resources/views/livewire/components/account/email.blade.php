<form class="space-y-6" wire:submit="submit">
    <x-form.input name="email" label="Email" wire:model.blur="email" required>
        @error('email')
            <span class="text-xs text-red-600">{{ $message }}</span>
        @enderror
    </x-form.input>

    <x-ui.button.primary type="submit" label="Update Email" wire:loading.attr="disabled" wire:target="submit" />
</form>
