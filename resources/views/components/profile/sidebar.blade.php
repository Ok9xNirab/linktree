<x-sidebar>
    <x-sidebar.nav>
        <x-sidebar.item href="/profile" name="profile" wire:navigate>
            Profile
        </x-sidebar.item>
        <x-sidebar.item href="/profile/qr-code" name="profile-qr-code" wire:navigate>
            QR Code
        </x-sidebar.item>
        <x-sidebar.item href="/profile/appearance" name="profile-appearance" wire:navigate>
            Appearance
        </x-sidebar.item>
        <x-sidebar.item href="/profile/account" name="profile-account" wire:navigate>
            Account
        </x-sidebar.item>
        <x-sidebar.item href="/profile/logout" name="profile-logout">
            <span class="text-red-600">Logout</span>
        </x-sidebar.item>
    </x-sidebar.nav>
    <x-sidebar.content>
        {{ $slot }}
    </x-sidebar.content>
</x-sidebar>
