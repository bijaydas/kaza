<?php

namespace App\Livewire\Home;

use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    public function render(): View
    {
        return view('livewire.home.home')
            ->layout('components.layouts.app', [
                'paginationFor' => 'home',
            ])
            ->title(getTitle('Home'));
    }
}
