<?php

namespace App\Services;

use App\Enums\Role;
use App\Exceptions\PermissionException;
use App\Exceptions\RoleException;
use App\Exceptions\UserException;
use App\Models\User as UserModel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission as PermissionModel;
use Spatie\Permission\Models\Role as RoleModel;

class User
{
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

    public function update(UserModel|Authenticatable $user, array $values): bool
    {
        return $user->update($values);
    }

    public function makeAdmin(UserModel $user): void
    {
        $role = RoleModel::findByName(Role::ADMIN->value);
        $user->assignRole($role);
    }

    public function makeUser(UserModel $user): void
    {
        $role = RoleModel::findByName(Role::USER->value);
        $user->assignRole($role);
    }

    public function getUsers(array $options = []): LengthAwarePaginator
    {
        $query = UserModel::query();

        if (isset($options['orderBy'])) {
            $query->orderBy($options['orderBy'][0], $options['orderBy'][1]);
        }

        return $query->paginate($options['paginate'] ?? 10);
    }

    public function getUserById(int $id): UserModel
    {
        return UserModel::findOrFail($id);
    }
}
