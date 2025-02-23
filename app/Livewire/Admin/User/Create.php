<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserForm;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public UserForm $form;

    public function createUser()
    {
        dd('hello world');
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
