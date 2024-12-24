<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.root')]
class Login extends Component
{
    #[Validate('required|email')]
    public string $email = 'admin@gmail.com';

    #[Validate('required')]
    public string $password = 'password';

    public function submit(): void
    {
        $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->addError('error', 'Invalid email or password');

            return;
        }
        $this->redirect(route('home'));
    }

    public function render(): View
    {
        return view('livewire.auth.login')
            ->title(getTitle('Login'));
    }
}
