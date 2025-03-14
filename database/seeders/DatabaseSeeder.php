<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            ExpenseCategorySeeder::class,

            UserSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
