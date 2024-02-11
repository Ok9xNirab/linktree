<?php

namespace App\Livewire\Components\Account;

use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Email extends Component
{
    public $email = '';

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ];
    }

    public function submit()
    {
        $this->validate();
        auth()->user()->update([
            'email' => $this->email
        ]);

        Toaster::success('Email Address updated!');
    }

    public function render()
    {
        return view('livewire.components.account.email');
    }

    public function mount()
    {
        $this->email = auth()->user()->email;
    }
}
