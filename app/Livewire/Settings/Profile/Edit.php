<?php

namespace App\Livewire\Settings\Profile;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Edit extends Component
{
    public UserForm $form;

    public function mount(): void
    {
        $this->form->setUpUser(getUser());
    }

    public function submit(): void
    {
        try {
            $this->form->update();
            session()->flash('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            $this->addError('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.settings.profile.edit')
            ->layoutData([
                'title' => 'Edit Profile',
            ]);
    }
}
