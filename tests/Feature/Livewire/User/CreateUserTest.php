<?php

use App\Livewire\ControlPanel\User\Create as UserCreate;
use Livewire\Livewire;

describe('create user', function () {
    it('should render view the create user page', function () {
        Livewire::test(UserCreate::class)->assertOk();

        $this->get(route('users.create'))->assertSeeLivewire(UserCreate::class);
    });
});
