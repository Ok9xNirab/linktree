<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class DashboardTitle extends Component
{
    public $title;
    public $desc;

    public function render()
    {
        return view('livewire.components.dashboard-title');
    }

    #[On('profile-updated')]
    public function onProfileUpdated($username)
    {
    }

    public function mount($title, $desc)
    {
        $this->title = $title;
        $this->desc = $desc;
    }
}
