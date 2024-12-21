<?php

namespace App\Livewire\Forms;

use App\Services\User as UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserForm extends Form
{
    public string $firstName = '';

    public string $lastName = '';

    public mixed $dateOfBirth = '';

    public mixed $anniversaryDate = '';

    public string $gender = 'not-selected';

    public string $type = '';

    public string $phone = '';

    public string $relationship = '';

    public string $status = '';

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
            'type' => $this->type,
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

    public function setUpUser(User $user): void
    {
        $this->fill([
            'firstName' => stringify($user->first_name),
            'lastName' => stringify($user->last_name),
            'dateOfBirth' => $user->birthday(),
            'anniversaryDate' => $user->anniversary(),
            'gender' => $user->gender ?? 'not-selected',
            'type' => stringify($user->type),
            'phone' => stringify($user->phone),
            'email' => stringify($user->email),
            'relationship' => stringify($user->relationship),
            'status' => $user->status,
        ]);
    }

    public function update(): void
    {
        $validator = Validator::make($this->all(), [
            'firstName' => ['nullable'],
            'lastName' => ['nullable'],
            'gender' => ['nullable'],
            'type' => ['nullable'],
            'phone' => ['nullable'],
            'relationship' => ['nullable'],
            'dateOfBirth' => ['nullable', 'date'],
            'anniversaryDate' => ['nullable', 'date'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user())],
            'password' => ['min:6'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        if ($validator->fails()) {
            $this->addError('errors', $validator->errors()->first());
            return;
        }

        $validated = $validator->validated();

        (new UserService())->update(auth()->user(), [
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'date_of_birth' => nullify($validated['dateOfBirth']),
            'anniversary_date' => nullify($validated['anniversaryDate']),
            'gender' => $validated['gender'],
            'type' => $validated['type'],
            'phone' => $validated['phone'],
            'relationship' => $validated['relationship'],
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);
    }
}
