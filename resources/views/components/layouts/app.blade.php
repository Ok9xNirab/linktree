<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Linkree' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    <livewire:components.header />
    {{ $slot }}
    <footer class="text-center text-lg py-2">
        <p>Created By <a class="text-violet-700 font-semibold hover:underline" href="https://nirab.me"
                target="_blank">Istiaq Nirab</a></p>
    </footer>
    <x-toaster-hub />
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
