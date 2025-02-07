<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Logout extends Component
{
    public function doLogout(): void
    {
        Auth::logout();
        $this->redirect(route('login'));
    }

    public function render(): View
    {
        return view('livewire.auth.logout');
    }
}
