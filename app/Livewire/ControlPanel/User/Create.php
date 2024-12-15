<?php

namespace App\Livewire\ControlPanel\User;

use App\Livewire\Forms\UserForm;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Create extends Component
{
    public UserForm $form;

    /**
     * @throws ValidationException
     */
    public function save(): void
    {
        $this->form->store();

        session()->flash('message', 'User created successfully.');
    }

    public function resetForm(): void
    {
        $this->form->formReset();
    }

    #[Title('Create')]
    public function render(): View
    {
        return view('livewire.control-panel.user.create');
    }
}
