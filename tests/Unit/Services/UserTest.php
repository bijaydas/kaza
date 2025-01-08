<?php

namespace Tests\Unit\Services;

use App\Services\User as UserService;

describe('user', function () {
    it('creates a new user', function () {

        $this->seed();

        $service = new UserService();

        $email = fake()->email;
        $password = 'password';

        $user = $service->createFull([
            'first_name' => 'John',
            'last_name' => '',
            'date_of_birth' => '1993-01-01',
            'anniversary_date' => '2000-01-01',
            'gender' => 'male',
            'type' => 'user',
            'phone' => '0123456789',
            'email' => $email,
            'password' => 'password',
        ]);

        expect($user->email)->toBe($email)
            ->and($user->password)->not()->toBe($password);
    });
});
