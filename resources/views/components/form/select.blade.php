@props(['name', 'label', 'options' => []])

<div class="grid gap-1.5">
    <label class="font-medium text-zinc-800" for="{{ $name }}">
        {{ $label }}
    </label>
    <div class="relative w-max">
        <select
            class="rounded-md text-sm focus:ring-zinc-800 focus:outline-transparent focus:ring-2 disabled:pointer-events-none disabled:opacity-50 border border-input shadow-sm hover:bg-accent h-9 px-4 py-2 w-[200px] appearance-none bg-transparent font-normal"
            id="{{ $name }}" {{ $attributes }}>
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">
                    {{ $option['label'] }}
                </option>
            @endforeach
        </select>
        <x-svg.chevron-down width="15" height="15" class="absolute right-3 top-2.5 h-4 w-4 opacity-50" />
    </div>
</div>
