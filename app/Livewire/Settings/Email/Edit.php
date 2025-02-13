<?php

namespace App\Livewire\Settings\Email;

use Livewire\Component;

class Edit extends Component
{
    public string $email = '';

    public function render()
    {
        return view('livewire.settings.email.edit')
            ->layoutData(['title' => 'Email']);
    }
}
