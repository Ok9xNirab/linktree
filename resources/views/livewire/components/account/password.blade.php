<form class="space-y-6 mt-12" wire:submit="submit">
    <x-form.input type="password" name="password" label="Password" wire:model.blur="password" required>
        @error('password')
            <span class="text-xs text-red-600">{{ $message }}</span>
        @enderror
    </x-form.input>
    <x-form.input type="password" name="new_password" label="New Password" wire:model.blur="new_password" required>
        @error('new_password')
            <span class="text-xs text-red-600">{{ $message }}</span>
        @enderror
    </x-form.input>
    <x-form.input type="password" name="new_password_confirmation" label="Confirm New Password"
        wire:model.blur="new_password_confirmation" required>
        @error('new_password_confirmation')
            <span class="text-xs text-red-600">{{ $message }}</span>
        @enderror
    </x-form.input>

    <x-ui.button.primary type="submit" label="Change Password" wire:loading.attr="disabled" wire:target="submit" />
</form>
