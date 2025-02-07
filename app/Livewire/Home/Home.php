<?php

namespace App\Livewire\Home;

use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    public function render(): View
    {
        return view('livewire.home.home')
            ->layoutData([
                'title' => 'Home',
            ]);
    }
}
