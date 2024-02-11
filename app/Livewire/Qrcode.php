<?php

namespace App\Livewire;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class Qrcode extends Component
{
    public function downloadQR()
    {
        $data = FacadesQrCode::size(512)
            ->format('png')
            ->generate(
                'https://twitter.com/HarryKir',
            );

        return response($data)
            ->header('Content-type', 'image/png');
    }

    public function render()
    {
        return view('livewire.qrcode')->layoutData([
            'title' => 'QR Code | Linkree'
        ]);
    }
}
