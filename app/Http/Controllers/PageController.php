<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index(string $slug)
    {
        $user = User::where('username', $slug)->first();
        if (!$user) {
            return abort(404);
        }

        $profile_image = 'https://gravatar.com/avatar/' . hash('sha256', strtolower(trim(auth()->user()->email))) . '?s=500';
        if (auth()->user()->photo) {
            $profile_image = Storage::url('pictures/' . auth()->user()->photo);
        }

        return view('themes.rounded.template', [
            'user' => $user,
            'profile_image' => $profile_image,
            'buttons' => $user->buttons,
            'socials' => $user->socials,
        ]);
    }
}
