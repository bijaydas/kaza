<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutButton extends Component
{
    public function submit(): void
    {
        Auth::logout();
        $this->redirect(route('login'));
    }

    public function render(): string
    {
        return <<<'HTML'
        <form wire:submit="submit" method="post">
            <button type="submit">Logout</button>
        </form>
        HTML;
    }
}
