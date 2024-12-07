<?php

use App\Enums\RoleEnum;

test('all roles are present', function () {
    $data = RoleEnum::data();
    expect($data)->toMatchArray([
        'ADMIN' => 'admin',
        'USER' => 'user',
    ]);
});

test('can get keys', function () {
    $data = RoleEnum::keys();

    expect($data)->toMatchArray([
        'ADMIN',
        'USER',
    ]);
});

test('can get values', function () {
    $data = RoleEnum::values();

    expect($data)->toMatchArray([
        'admin',
        'user',
    ]);
});

test('find by value key should be ok', function () {
    $data = RoleEnum::find('admin');
    expect($data)->toBe('admin');
});

test('find by fake key should be null', function () {
    $data = RoleEnum::find('fake');
    expect($data)->toBeNull();
});
