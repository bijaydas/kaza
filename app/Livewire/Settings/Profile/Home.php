<?php

namespace App\Livewire\Settings\Profile;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.settings.profile.home')
            ->with('user', auth()->user())
            ->layoutData(['title' => 'Profile']);
    }
}
