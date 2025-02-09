<?php

namespace App\Livewire\Settings\Profile;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.settings.profile.home')
            ->layoutData([
                'title' => 'Profile',
            ]);
    }
}
