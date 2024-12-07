<?php

describe('user command', function () {
    it('creates a new user', function () {
        $this->artisan('make:user')
            ->expectsQuestion('What is your email?', fake()->email)
            ->expectsQuestion('and your password?', 'password')
            ->expectsChoice('What is the role?', 'admin', getRolesData())
            ->expectsOutputToContain('User created! You can login here');
    });
});
