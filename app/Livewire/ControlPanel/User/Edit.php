<?php

namespace App\Livewire\ControlPanel\User;

use App\Enums\AccountStatus;
use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class Edit extends Component
{
    public UserForm $form;

    public string $updateId = '';

    public function mount(string $id): void
    {
        $user = User::where('id', $id)->firstOrFail();
        $this->form->setUpUser($user);
        $this->updateId = $id;
    }

    public function save(): void
    {
        if ($this->form->update($this->updateId)) {
            session()->flash('message', 'User updated successfully.');
        }
    }

    public function render(): View
    {
        return view('livewire.control-panel.user.edit')
            ->with('d_status', AccountStatus::values())
            ->title(getTitle('Edit User'));
    }
}
