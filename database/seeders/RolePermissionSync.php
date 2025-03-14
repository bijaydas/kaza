<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSync extends Seeder
{
    public function run(): void
    {
        $permissions = getPermissionsData();
        $admin = Role::where('name', 'admin')->first();
        $admin->syncPermissions($permissions);
    }
}
