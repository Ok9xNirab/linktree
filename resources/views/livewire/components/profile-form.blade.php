<div>
    <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full"></div>
    <form class="space-y-6" wire:submit="submit">
        <div class="space-y-2 flex items-center gap-6">
            <div class="relative">

                <img class="w-20 h-20 rounded-full border-2 border-zinc-800"
                    src="{{ auth()->user()->getProfileImageURL() }}" alt="{{ auth()->user()->name }}" />
                @if (auth()->user()->photo)
                    <button type="button" class="absolute -top-1 right-0 bg-white w-max rounded-full"
                        wire:click='removePhoto'>
                        <x-svg.close class="w-6 h-6 text-red-600" />
                    </button>
                @endif
            </div>
            <x-ui.button.secondary class="relative">
                <input class="opacity-0 absolute inset-0" type="file" wire:model.live="photo" />
                <span>+ Upload</span>
            </x-ui.button.secondary>
        </div>
        <div class="space-y-2">
            <x-form.input name="username" label="Username" wire:model.blur="username" required>
                @error('username')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </x-form.input>
        </div>
        <div class="space-y-2">
            <x-form.input name="name" label="Name" wire:model.blur="name" required>
                @error('name')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </x-form.input>
        </div>
        <div class="space-y-2">
            <x-form.input name="bio" label="Bio" placeholder="Full Stack Web Developer" wire:model.blur="bio"
                required>
                @error('bio')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </x-form.input>
        </div>
        <div>
            <div wire:sortable="updateButtonOrder" class="space-y-2 mb-2"><label
                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                    for=":r15:-form-item">Buttons</label>
                <p id=":r15:-form-item-description" class="text-xs text-zinc-500">Add your links to display button.</p>
                @foreach ($buttons as $key => $button)
                    <div wire:sortable.item="{{ $key }}" wire:key="button-{{ $key }}"
                        class="flex items-center gap-2">
                        <button type="button" class="cursor-move" wire:sortable.handle>
                            <x-svg.bars class="w-5 h-5" />
                        </button>
                        <input
                            class="w-full border rounded-md text-sm text-zinc-600 px-3 py-1.5 focus:ring-zinc-800 focus:outline-transparent focus:ring-2"
                            placeholder="Label" wire:model="buttons.{{ $key }}.label" required />
                        <input
                            class="w-full border rounded-md text-sm text-zinc-600 px-3 py-1.5 focus:ring-zinc-800 focus:outline-transparent focus:ring-2"
                            placeholder="URL" wire:model="buttons.{{ $key }}.url" required />
                        @if (count($buttons) > 1)
                            <button type="button" wire:click="removeButton({{ $key }})">
                                <x-svg.close class="w-6 h-6 text-red-600" />
                            </button>
                        @endif
                    </div>
                    @error('buttons.' . $key . '.label')
                        <p class="text-xs text-red-600">The label field is required.</p>
                    @enderror
                    @error('buttons.' . $key . '.url')
                        <p class="text-xs text-red-600">The URL field is required.</p>
                    @enderror
                @endforeach
            </div>
            <x-ui.button.secondary class="mt-2" wire:click="addButton">
                Add Button
            </x-ui.button.secondary>
        </div>
        <div>
            <div wire:sortable="updateSocialOrder" class="space-y-2 mb-2"><label
                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                    for=":r15:-form-item">Socials</label>
                <p id=":r15:-form-item-description" class="text-xs text-zinc-500">Add your facebook, twitter,
                    github, etc. links.</p>
                @foreach ($urls as $key => $url)
                    <div wire:sortable.item="{{ $key }}" wire:key="task-{{ $key }}"
                        class="flex items-center gap-2">
                        <button type="button" class="cursor-move" wire:sortable.handle>
                            <x-svg.bars class="w-5 h-5" />
                        </button>
                        <div class="relative w-max">
                            <select
                                class="rounded-md text-sm
                                focus:ring-zinc-800 focus:outline-transparent focus:ring-2 disabled:pointer-events-none disabled:opacity-50 border border-input shadow-sm hover:bg-accent h-9 px-4 py-2 w-[200px] appearance-none bg-transparent font-normal"
                                wire:model="urls.{{ $key }}.type" name="font" id=":r8b:-form-item"
                                aria-describedby=":r8b:-form-item-description" aria-invalid="false">
                                @foreach ($this->socials as $social)
                                    <option value="{{ $social->id }}">{{ $social->name }}</option>
                                @endforeach
                            </select>
                            <x-svg.chevron-down width="15" height="15"
                                class="absolute right-3 top-2.5 h-4 w-4 opacity-50" />
                        </div>
                        <input
                            class="w-full border rounded-md text-sm text-zinc-600 px-3 py-1.5 focus:ring-zinc-800 focus:outline-transparent focus:ring-2"
                            placeholder="URL" wire:model="urls.{{ $key }}.url" required />
                        @if (count($urls) > 1)
                            <button type="button" wire:click="removeSocial({{ $key }})">
                                <x-svg.close class="w-6 h-6 text-red-600" />
                            </button>
                        @endif
                    </div>
                    @error('urls.' . $key . '.url')
                        <p class="text-xs text-red-600">The URL field is required.</p>
                    @enderror
                @endforeach
            </div>
            <x-ui.button.secondary class="mt-2" wire:click="addSocial">
                Add URL
            </x-ui.button.secondary>
        </div>

        <x-ui.button.primary type="submit" label="Update profile" wire:loading.attr="disabled" wire:target="submit" />
    </form>
</div>
