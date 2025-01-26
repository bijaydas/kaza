<?php

namespace App\Livewire\Shared;

use Illuminate\View\View;
use Livewire\Component;

class TopNav extends Component
{
    public string $breadcrumbsFor;

    public function render(): View
    {
        return view('livewire.shared.top-nav');
    }
}
