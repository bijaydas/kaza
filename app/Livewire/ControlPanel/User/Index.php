<?php

namespace App\Livewire\ControlPanel\User;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public function render(): View
    {
        return view('livewire.control-panel.user.index')
            ->with('users', User::all()->except(auth()->id()))
            ->title(getTitle('Users'));
    }
}
