<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $values = getRolesData();

        foreach ($values as $value) {
            Role::create(['name' => $value]);
        }
    }
}
