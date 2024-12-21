<?php

namespace App\Livewire\ControlPanel;

use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.control-panel.home-page')
            ->title(getTitle('Control Panel'));
    }
}
