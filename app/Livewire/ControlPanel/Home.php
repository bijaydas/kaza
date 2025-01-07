<?php

namespace App\Livewire\ControlPanel;

use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    public function render(): View
    {
        return view('livewire.control-panel.home')
            ->title(getTitle('Control Panel'));
    }
}
