<?php

namespace App\Livewire\Home;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Page extends Component
{
    public function render(): View
    {
        return view('livewire.home.page')
            ->title(getTitle('Dashboard'));
    }
}
