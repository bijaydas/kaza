<?php

use App\Enums\PermissionEnum;

test('all permissions are present', function () {
    $data = PermissionEnum::data();
    expect($data)->toMatchArray([
        'CREATE_ADMIN' => 'create_admin',
        'EDIT_ADMIN' => 'edit_admin',
        'VIEW_ADMIN' => 'view_admin',
        'DELETE_ADMIN' => 'delete_admin',
        'CREATE_USER' => 'create_user',
        'EDIT_USER' => 'edit_user',
        'VIEW_USER' => 'view_user',
        'DELETE_USER' => 'delete_user',
    ]);
});

test('can get keys', function () {
    $data = PermissionEnum::keys();

    expect($data)->toMatchArray([
        'CREATE_ADMIN',
        'EDIT_ADMIN',
        'VIEW_ADMIN',
        'DELETE_ADMIN',
        'CREATE_USER',
        'EDIT_USER',
        'VIEW_USER',
        'DELETE_USER',
    ]);
});

test('can get values', function () {
    $data = PermissionEnum::values();

    expect($data)->toMatchArray([
        'create_admin',
        'edit_admin',
        'view_admin',
        'delete_admin',
        'create_user',
        'edit_user',
        'view_user',
        'delete_user',
    ]);
});

test('find by value key should be ok', function () {
    $data = PermissionEnum::find('create_user');
    expect($data)->toBe('create_user');
});

test('find by fake key should be null', function () {
    $data = PermissionEnum::find('fake');
    expect($data)->toBeNull();
});
