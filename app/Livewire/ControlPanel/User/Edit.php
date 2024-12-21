<?php

namespace App\Livewire\ControlPanel\User;

use App\Enums\UserStatusEnum;
use Illuminate\View\View;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use App\Models\User;

class Edit extends Component
{
    public UserForm $form;

    public function mount(string $id): void
    {
        $user = User::where('id', $id)->firstOrFail();
        $this->form->setUpUser($user);
    }

    public function save(): void
    {
        $this->form->update();

        session()->flash('message', 'User updated successfully.');
    }

    public function render(): View
    {
        return view('livewire.control-panel.user.edit')
            ->with('d_status', UserStatusEnum::values())
            ->title(getTitle('Edit User'));
    }
}
