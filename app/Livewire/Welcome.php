<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.welcome')->layoutData([
            'title' => 'Linkree | Free Personal Link sharing profiles'
        ]);
    }
}
