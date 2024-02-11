<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function submit()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect('/profile');
        }

        $this->addError('email', 'Invalid email or password');
    }

    public function render()
    {
        return view('livewire.login')->layoutData(['title' => 'Login | Linkree']);
    }
}
