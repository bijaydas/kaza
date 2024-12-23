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
            <button class="w-full flex items-center space-x-2" type="submit">
                <x-heroicon-o-arrow-left-on-rectangle class="w-4" />
                <span>Logout</span>
            </button>
        </form>
        HTML;
    }
}
