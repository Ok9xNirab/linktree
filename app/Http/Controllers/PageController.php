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

        return view('themes.rounded.template', [
            'user' => $user,
            'buttons' => $user->buttons,
            'socials' => $user->socials,
        ]);
    }
}
