<main class="max-w-6xl mx-auto mb-20">
    <livewire:components.dashboard-title title="QR Code" desc="Scan or Download the QR code." />
    <x-profile.sidebar>
        {!! QrCode::size(256)->generate(env('APP_URL') . '/' . auth()->user()->username) !!}
        <x-ui.button.secondary class="mt-6" wire:click="downloadQR">
            Download
        </x-ui.button.secondary>
    </x-profile.sidebar>
</main>
