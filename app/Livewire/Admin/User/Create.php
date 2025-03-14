<?php

namespace App\Livewire\Admin\User;

use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public function render(): View
    {
        return view('livewire.admin.user.create')
            ->layoutData(['title' => 'Create user']);
    }
}
