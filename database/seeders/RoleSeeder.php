<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $values = RoleEnum::values();

        foreach ($values as $value) {
            Role::create(['name' => $value]);
        }
    }
}
