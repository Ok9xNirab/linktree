<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $user->name }} &#8212; {{ $user->bio }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap" rel="stylesheet">
    @vite('resources/views/themes/rounded/styles/main.css')
</head>

<body>
    <div @if ($user->appearance['bg_type'] !== 'gradient') style="background-image: url('{{ $user->appearance['bg'] }}')" @endif
        class="px-6 bg-gradient-to-t {{ $user->appearance['bg'] }} bg-no-repeat bg-cover bg-center fixed inset-0 -z-20">
        <div class="fixed inset-0 -z-10 backdrop-brightness-50"></div>
    </div>

    <div class="max-w-2xl mx-auto text-white">
        <div class="flex flex-col gap-10 justify-center items-center min-h-screen p-6">
            <div class="flex flex-col gap-4">
                <img class="w-[200px] h-[200px] rounded-full mx-auto" src="{{ $profile_image }}" alt="hello world" />
                <div class="flex flex-col gap-2">
                    <h5 class="font-semibold text-3xl text-center">
                        {{ $user->name }}
                    </h5>
                    @if ($user->bio)
                        <p>{{ $user->bio }}</p>
                    @endif
                </div>
            </div>
            <div class="max-w-md w-full mx-auto">
                <div class="flex flex-col gap-4">
                    @foreach ($buttons as $button)
                        <a href="{{ $button->link }}" target="_blank">
                            <button
                                class="bg-white border-2 border-white w-full text-center text-black py-5 rounded-full hover:bg-transparent hover:text-white text-lg">
                                {{ $button->label }}
                            </button>
                        </a>
                    @endforeach
                </div>
                <div class="my-10 flex items-center flex-wrap gap-4 justify-center">
                    @foreach ($socials as $social)
                        <a href="{{ $social->link }}" target="_blank">
                            <x-dynamic-component :component="'svg.template.' . $social->social->slug" width="40px" height="40px" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
