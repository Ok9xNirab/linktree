<?php

use App\Http\Controllers\PageController;
use App\Livewire\Account;
use App\Livewire\Appearance;
use App\Livewire\Login;
use App\Livewire\Profile;
use App\Livewire\Qrcode;
use App\Livewire\Signup;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Welcome::class);
Route::get('/login', Login::class)->name('login');
Route::get('/signup', Signup::class);
Route::middleware('auth')->prefix('/profile')->group(function () {
    Route::get('/', Profile::class)->middleware('auth')->name('profile');
    Route::get('/qr-code', Qrcode::class)->middleware('auth')->name('profile-qr-code');
    Route::get('/appearance', Appearance::class)->middleware('auth')->name('profile-appearance');
    Route::get('/account', Account::class)->middleware('auth')->name('profile-account');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->middleware('auth');
});

Route::get('/{slug}', [PageController::class, 'index']);
