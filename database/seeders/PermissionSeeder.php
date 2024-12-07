<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $values = getPermissionsData();

        foreach ($values as $value) {
            Permission::create(['name' => $value]);
        }
    }
}
