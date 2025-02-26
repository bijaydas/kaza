<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserForm;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public UserForm $form;

    public function createUser(): void
    {
        $this->form->store();

        session()->flash('success', 'User created successfully.');
    }

    public function resetForm(): void
    {
        $this->form->formReset();
    }

    public function render(): View
    {
        return view('livewire.admin.user.create')
            ->layoutData(['title' => 'Create user']);
    }
}
