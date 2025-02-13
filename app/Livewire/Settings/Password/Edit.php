<?php

namespace App\Livewire\Settings\Password;

use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public string $current_password = '';
    public string $new_password = '';
    public string $password_confirmation = '';

    public function updatePassword(): void
    {
        $this->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'same:new_password'],
        ]);

        auth()->user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('success', 'Password updated successfully.');

        $this->reset('current_password', 'new_password', 'password_confirmation');
    }

    public function render(): View
    {
        return view('livewire.settings.password.edit')
            ->layoutData(['title' => 'Change Password']);
    }
}
