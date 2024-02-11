<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AppearanceForm extends Component
{
    public $styles = 'rounded';
    public $bg_type = 'gradient';
    public $bg = "from-zinc-700 to-orange-600";
    public $bg_url = "https://source.unsplash.com/random";
    public $bg_colors = ['from-zinc-700 to-orange-600', 'from-zinc-700 to-green-600', 'from-zinc-700 to-white', 'from-zinc-700 to-pink-600', 'from-zinc-700 to-purple-600'];

    public function submit()
    {
        auth()->user()->update([
            'appearance' => [
                'styles' => $this->styles,
                'bg_type' => $this->bg_type,
                'bg' => $this->bg_type === 'gradient' ? $this->bg : $this->bg_url
            ]
        ]);

        Toaster::success('Appearance updated!');
    }

    public function render()
    {
        return view('livewire.components.appearance-form');
    }

    public function mount()
    {
        $appearance = auth()->user()->appearance;
        $this->styles = $appearance['styles'];
        $this->bg_type = $appearance['bg_type'];
        if ($appearance['bg_type'] === 'gradient') {
            $this->bg = $appearance['bg'];
        } else {
            $this->bg_url = $appearance['bg'];
        }
    }
}
