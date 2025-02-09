<?php

namespace App\Livewire\Settings\Profile;

use Livewire\Component;

class Edit extends Component
{
    public ?string $first_name = '';
    public ?string $last_name = '';
    public ?string $date_of_birth = '';
    public ?string $anniversary_date = '';
    public ?string $phone = '';

    public function mount(): void
    {
        if (auth()->user()->date_of_birth) {
            $this->date_of_birth = auth()->user()->date_of_birth->format('Y-m-d');
        }
        if (auth()->user()->anniversary_date) {
            $this->anniversary_date = auth()->user()->anniversary_date->format('Y-m-d');
        }

        $this->fill([
            'first_name' => auth()->user()->first_name,
            'last_name' => auth()->user()->last_name,
            'gender' => auth()->user()->gender,
            'phone' => auth()->user()->phone
        ]);
    }

    public function updateProfile(): void
    {
        auth()->user()->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'anniversary_date' => $this->anniversary_date,
            'phone' => $this->phone
        ]);

        session()->flash('success', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.settings.profile.edit')
            ->layoutData([
                'title' => 'Edit Profile'
            ]);
    }
}
