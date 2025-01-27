<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class LogoutButton extends Component
{
    #[On('logout')]
    public function submit(): void
    {
        Auth::logout();
        $this->redirect(route('login'));
    }

    public function render(): string
    {
        return <<<'HTML'
        <button @click="$dispatch('logout')" type="button" class="item">
            <x-heroicon-o-arrow-left-on-rectangle class="w-5" />
            <span>Logout</span>
        </button>
        HTML;
    }
}
