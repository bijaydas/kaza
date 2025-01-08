<?php

namespace App\Console\Commands;

use App\Services\User as UserService;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'make:user {email?} {password?} {role?}';

    protected $description = 'Create a new user';

    public function handle(): void
    {
        $email = $this->argument('email');
        $password = $this->argument('password');
        $role = $this->argument('role');

        if (! $email) {
            $email = $this->ask('What is your email?');
        }

        if (! $password) {
            $password = $this->ask('and your password?');
        }

        if (! $role) {
            $role = $this->choice('What is the role?', getRolesData());
        }

        $userService = new UserService();

        try {
            $userService->create($email, $password, $role);
            $this->info('User created! You can login here '.route('login'));
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
