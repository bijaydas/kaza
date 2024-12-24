<?php

namespace App\Livewire\ControlPanel\User;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    public function render(): View
    {
        return view('livewire.control-panel.user.index')
            ->with('users', User::all()->except(auth()->id()))
            ->title(getTitle('Users'));
    }
}
