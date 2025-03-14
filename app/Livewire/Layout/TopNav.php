<?php

namespace App\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class TopNav extends Component
{
    #[On('logout')]
    public function logout(): void
    {
        auth()->user()->loginSessions()
            ->where('session_id', session()->getId())
            ->first()
            ->update([
                'logout_at' => now(),
            ]);

        session()->invalidate();
        session()->regenerateToken();

        auth()->logout();
        redirect()->route('login');
    }

    public function render(): View
    {
        return view('livewire.layout.top-nav')
            ->with('name', auth()->user()->fullName())
            ->with('isAdmin', auth()->user()->isAdmin());
    }
}
