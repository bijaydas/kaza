<?php

namespace App\Livewire\Settings\Email;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.settings.email.home')
            ->layoutData([
                'title' => 'Email Settings',
            ]);
    }
}
