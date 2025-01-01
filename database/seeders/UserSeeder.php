<?php

namespace Database\Seeders;

use App\Services\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(User $user): void
    {
        $user->create('admin@gmail.com', 'password', 'admin');
    }
}
