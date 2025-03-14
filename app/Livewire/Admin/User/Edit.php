<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserForm;
use Illuminate\View\View;
use Livewire\Component;

class Edit extends Component
{
    public UserForm $form;

    public string $userId = '';

    public function mount(string $id): void
    {
        $this->userId = $id;

        $this->form->setUpUser($this->userId);
    }

    public function save(): void
    {
        $this->form->updateUser($this->userId);

        session()->flash('success', 'User updated successfully.');
    }

    public function render(): View
    {
        return view('livewire.admin.user.edit')
            ->layoutData(['title' => 'Edit '.$this->userId]);
    }
}
