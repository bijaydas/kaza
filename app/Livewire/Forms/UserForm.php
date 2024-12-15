<?php

namespace App\Livewire\Forms;

use App\Services\User as UserService;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    public string $firstName = '';

    public string $lastName = '';

    public string $dateOfBirth = '';

    public string $anniversaryDate = '';

    public string $gender = 'not-selected';

    public string $accountType = 'user';

    public string $phone = '';

    public string $relationship = '';

    #[Validate('required|unique:users')]
    public string $email = '';

    #[Validate('required|min:6|max:20')]
    public string $password = '';

    public function store(): void
    {
        $this->validate();

        (new UserService)->createFull([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'date_of_birth' => $this->dateOfBirth,
            'anniversary_date' => $this->anniversaryDate,
            'gender' => $this->gender,
            'type' => $this->accountType,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();
    }

    public function formReset(): void
    {
        $this->reset();
    }
}
