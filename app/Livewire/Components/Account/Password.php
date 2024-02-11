<?php

namespace App\Livewire\Components\Account;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Password extends Component
{
    #[Validate('required')]
    public $password = '';

    #[Validate('required|confirmed')]
    public $new_password = '';

    #[Validate('required')]
    public $new_password_confirmation = '';

    public function submit()
    {
        $this->validate();

        if (!Hash::check($this->password, auth()->user()->password)) {
            Toaster::error('Wrong password!');
        }

        auth()->user()->update([
            'password' => bcrypt($this->new_password)
        ]);

        Toaster::success('Password changed!');
    }

    public function render()
    {
        return view('livewire.components.account.password');
    }
}
