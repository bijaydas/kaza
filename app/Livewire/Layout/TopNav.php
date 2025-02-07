<?php

namespace App\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Component;

class TopNav extends Component
{
    public function render(): View
    {
        return view('livewire.layout.top-nav')
            ->with('name', auth()->user()->fullName())
            ->with('isAdmin', auth()->user()->isAdmin());
    }
}
