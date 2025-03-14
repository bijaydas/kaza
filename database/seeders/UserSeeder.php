<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Services\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private function createDemoUsers(): void
    {
        $user = app(User::class);

        $user->create('admin@gmail.com', 'password', Role::ADMIN->value);
        $user->create('tony@gmail.com', 'password', Role::USER->value);
        $user->create('bruce@gmail.com', 'password', Role::USER->value);
        $user->create('natasha@gmail.com', 'password', Role::USER->value);
        $user->create('stephen@gmail.com', 'password', Role::USER->value);
    }

    public function run(): void
    {
        $this->createDemoUsers();
    }
}
