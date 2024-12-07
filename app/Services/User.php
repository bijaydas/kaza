<?php

namespace App\Services;

use App\Enums\RoleEnum;
use App\Exceptions\RoleException;
use App\Exceptions\UserException;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User
{
    public function __construct() {}

    /**
     * @throws RoleException
     * @throws UserException
     */
    public function create(string $email, string $password, string $role): UserModel
    {
        $user = UserModel::where('email', $email)->first();

        if ($user) {
            throw UserException::alreadyExists();
        }

        if (! RoleEnum::isValidValue($role)) {
            throw RoleException::notFound($role);
        }

        return UserModel::create([
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
        ]);
    }
}
