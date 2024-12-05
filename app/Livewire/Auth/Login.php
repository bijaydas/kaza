<?php

namespace App\Livewire\Auth;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function submit(): void
    {
        $this->validate();
    }

    public function render(): View
    {
        return view('livewire.auth.login')
            ->title(getTitle('Login'));
    }
}
