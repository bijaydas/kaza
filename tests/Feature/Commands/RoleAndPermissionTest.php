<?php

use Spatie\Permission\Models\Permission as PermissionModel;
use Spatie\Permission\Models\Role as RoleModel;

describe('permissions', function () {
    it('permission fresh command success', function () {
        $this->artisan('permission fresh')
            ->expectsConfirmation('Are you sure you want to fresh permissions ?', 'yes')
            ->expectsOutput('Permissions successfully refreshed');

        $edit_user = PermissionModel::where('name', 'edit_user')->first();
        $create_admin = PermissionModel::where('name', 'create_admin')->first();

        expect($edit_user->name)->toBe('edit_user')
            ->and($create_admin->name)->toBe('create_admin');
    });

    it('permission fresh command deny', function () {
        $this->artisan('permission fresh')
            ->expectsConfirmation('Are you sure you want to fresh permissions ?')
            ->expectsOutput('Exiting fresh permissions operation.');
    });
});

describe('role', function () {
    it('role fresh command success', function () {
        $this->artisan('role fresh')
            ->expectsConfirmation('Are you sure you want to fresh roles ?', 'yes')
            ->expectsOutput('Role successfully refreshed');

        $admin = RoleModel::where('name', 'admin')->first();
        $user = RoleModel::where('name', 'user')->first();

        expect($admin->name)->toBe('admin')
            ->and($user->name)->toBe('user');
    });

    it('role fresh command deny', function () {
        $this->artisan('role fresh')
            ->expectsConfirmation('Are you sure you want to fresh roles ?')
            ->expectsOutput('Exiting fresh roles operation.');
    });
});
