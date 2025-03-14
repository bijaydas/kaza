<?php

namespace App\Livewire\Forms;

use App\Enums\Role;
use App\Exceptions\PermissionException;
use App\Exceptions\RoleException;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('nullable|string')]
    public string $firstName = '';

    #[Validate('nullable|string')]
    public string $lastName = '';

    #[Validate('nullable|date')]
    public mixed $dateOfBirth = '';

    #[Validate('nullable|date')]
    public mixed $anniversaryDate = '';

    #[Validate('string|in:0,male,female')]
    public string $gender = '0';

    public string $role = 'user';

    #[Validate('nullable')]
    public string $phone = '';

    #[Validate('string')]
    public string $accountStatus = '';

    #[Validate('required|unique:users')]
    public string $email = '';

    #[Validate('required|min:6|max:20')]
    public string $password = '';

    public function formReset(): void
    {
        $this->reset();
    }

    public function setUpUser(User|Authenticatable|int $user): void
    {
        if (is_int($user)) {
            $user = User::findOrFail($user);
        }

        $this->fill([
            'firstName' => stringify($user->first_name),
            'lastName' => stringify($user->last_name),
            'dateOfBirth' => $user->birthday(),
            'anniversaryDate' => $user->anniversary(),
            'gender' => $user->gender ?? '0',
            'phone' => stringify($user->phone),
            'email' => stringify($user->email),
            'status' => $user->status,
        ]);

        $this->role = $user->roles->first()->name;
    }

    public function updateUser(User|Authenticatable|int $user): void
    {
        if (is_int($user)) {
            $user = User::findOrFail($user);
        }

        $validatedData = $this->validate([
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'dateOfBirth' => 'nullable|date',
            'anniversaryDate' => 'nullable|date',
            'gender' => 'string|in:0,male,female',
            'phone' => 'nullable',
            'role' => [Rule::in(Role::values())],
        ]);

        $user->update([
            'first_name' => $validatedData['firstName'],
            'last_name' => $validatedData['lastName'],
            'date_of_birth' => $validatedData['dateOfBirth'],
            'anniversary_date' => $validatedData['anniversaryDate'],
            'gender' => $validatedData['gender'],
            'phone' => $validatedData['phone'],
        ]);

        $user->syncRoles($validatedData['role']);
    }
}
