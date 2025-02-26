<?php

namespace App\Services;

use App\Enums\UserRole;
use App\Exceptions\PermissionException;
use App\Exceptions\RoleException;
use App\Exceptions\UserException;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission as PermissionModel;
use Spatie\Permission\Models\Role as RoleModel;

class User
{
    public function __construct() {}

    /**
     * Check if role and permission has been setup
     *
     * @throws PermissionException
     * @throws RoleException
     */
    private function checkRoleAndPermissionsSetup(): void
    {
        $rolesCount = RoleModel::all()->count();
        $permissionsCount = PermissionModel::all()->count();

        if ($rolesCount == 0) {
            throw RoleException::notSetup();
        }

        if ($permissionsCount == 0) {
            throw PermissionException::notSetup();
        }
    }

    /**
     * @throws PermissionException
     * @throws RoleException
     * @throws UserException
     */
    public function create(string $email, string $password, string $role): UserModel
    {
        $this->checkRoleAndPermissionsSetup();

        $role = RoleModel::findByName($role);

        $user = UserModel::where('email', $email)->first();

        if ($user) {
            throw UserException::alreadyExists();
        }

        $user = UserModel::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->assignRole($role);

        return $user;
    }

    /**
     * @throws RoleException
     * @throws PermissionException
     */
    public function createFull(array $values): UserModel
    {
        $this->checkRoleAndPermissionsSetup();

        return UserModel::create($values);
    }

    public function update(UserModel $user, array $values): bool
    {
        return $user->update($values);
    }

    public function makeAdmin(UserModel $user): void
    {
        $role = RoleModel::findByName(UserRole::ADMIN->value);
        $user->assignRole($role);
    }

    public function makeUser(UserModel $user): void
    {
        $role = RoleModel::findByName(UserRole::USER->value);
        $user->assignRole($role);
    }
}
