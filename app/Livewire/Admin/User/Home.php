<?php

namespace App\Livewire\Admin\User;

use App\Services\User;
use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    public function render(): View
    {
        return view('livewire.admin.user.home')
            ->with('users', (new User())->getUsers([
                'orderBy' => ['created_at', 'desc'],
            ]))
            ->layoutData(['title' => 'Users']);
    }
}
