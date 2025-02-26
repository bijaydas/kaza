<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    public function render(): View
    {
        return view('livewire.admin.user.home')
            ->with('users', User::all())
            ->layoutData(['title' => 'Admin | Users']);
    }
}
