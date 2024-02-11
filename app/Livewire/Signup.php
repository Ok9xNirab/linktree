<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Url;
use Livewire\Component;

class Signup extends Component
{

    #[Validate('required|unique:users'), Url]
    public $username = '';

    #[Validate('required')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|confirmed')]
    public $password = '';

    #[Validate('required')]
    public $password_confirmation = '';

    public function submit()
    {
        $this->validate();

        $user = User::create([
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'appearance' => [
                'styles' => 'rounded',
                'bg_type' => 'gradient',
                'bg' => 'from-zinc-700 to-orange-600'
            ]
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function updated($field)
    {
        $this->resetValidation($field);
    }

    public function render()
    {
        return view('livewire.signup')->layoutData([
            'title' => 'Signup | Linkree'
        ]);
    }

    public function mount()
    {
    }
}
