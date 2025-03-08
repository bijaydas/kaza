<?php

namespace App\Livewire\Forms;

use App\Enums\UserRole;
use App\Exceptions\PermissionException;
use App\Exceptions\RoleException;
use App\Models\User;
use App\Services\User as UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Contracts\Auth\Authenticatable;

class UserForm extends Form
{
    public string $firstName = '';

    public string $lastName = '';

    public mixed $dateOfBirth = '';

    public mixed $anniversaryDate = '';

    public string $gender = 'not-selected';

    public string $role = 'user';

    public string $phone = '';

    public string $status = '';

    #[Validate('required|unique:users')]
    public string $email = '';

    #[Validate('required|min:6|max:20')]
    public string $password = '';

    /**
     * @throws RoleException
     * @throws PermissionException
     * @throws ValidationException
     */
    public function store(): void
    {
        $this->validate();

        $data = [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'date_of_birth' => nullify($this->dateOfBirth),
            'anniversary_date' => nullify($this->anniversaryDate),
            'gender' => $this->gender,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];

        $service = new UserService();

        $user = $service->createFull($data);

        if ($this->role === UserRole::ADMIN->value) {
            $service->makeAdmin($user);
        } else {
            $service->makeUser($user);
        }

        $this->formReset();
    }

    public function formReset(): void
    {
        $this->reset();
    }

    public function setUpUser(User|Authenticatable $user): void
    {
        $this->fill([
            'firstName' => stringify($user->first_name),
            'lastName' => stringify($user->last_name),
            'dateOfBirth' => $user->birthday(),
            'anniversaryDate' => $user->anniversary(),
            'gender' => $user->gender ?? 'not-selected',
            'phone' => stringify($user->phone),
            'email' => stringify($user->email),
            'status' => $user->status,
        ]);
    }

    public function update(): void
    {
        $data = $this->validate([
            'firstName' => ['nullable'],
            'lastName' => ['nullable'],
            'phone' => ['nullable'],
            'dateOfBirth' => ['nullable', 'date'],
            'anniversaryDate' => ['nullable', 'date'],
        ]);

        $service = new UserService();
        $service->update(getUser(), [
            'first_name' => sanitizeValue($data['firstName']),
            'last_name' => sanitizeValue($data['lastName']),
            'phone' => sanitizeValue($data['phone']),
            'date_of_birth' => nullify($data['dateOfBirth']),
            'anniversary_date' => nullify($data['anniversaryDate']),
        ]);
    }
}
