<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\User;

class UserSeeder extends Seeder
{
    public function run(User $user): void
    {
        $user->create('admin@gmail.com', 'password', 'admin');
    }
}
