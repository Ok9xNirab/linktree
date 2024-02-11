<form class="space-y-6" wire:submit="submit">
    <x-form.select name="styles" label="Styles" :options="[['label' => 'Rounded', 'value' => 'rounded']]" wire:model="styles" />
    <x-form.select name="background" label="Background" :options="[['label' => 'Gradient', 'value' => 'gradient'], ['label' => 'Image', 'value' => 'image']]" wire:model.live="bg_type" />
    @if ($bg_type === 'gradient')
        <div class="flex flex-wrap gap-2">
            @foreach ($bg_colors as $bg_color)
                <label class="relative">
                    <input type="radio" value="{{ $bg_color }}"
                        class="w-4 h-4 text-zinc-800 bg-gray-100 border-gray-300 rounded accent-zinc-800 focus:outline-transparent absolute top-1 left-1"
                        wire:model="bg" />
                    <div class="w-[50px] h-[50px] bg-gradient-to-t border border-zinc-800 {{ $bg_color }}">
                    </div>
                </label>
            @endforeach
        </div>
    @else
        <div class="space-y-2">
            <x-form.input name="background_image_url" wire:model="bg_url" label="Background Image URL"
                placeholder="https://source.unsplash.com/random" required />
        </div>
    @endif

    <x-ui.button.primary type="submit" label="Update Appearance" wire:loading.attr="disabled" wire:target="submit" />
</form>
