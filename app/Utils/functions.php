<?php

use Illuminate\Support\Facades\DB;

function getTitle(?string $title): string
{
    return config('app.name').' | '.$title ?? 'Title not set';
}

if (! function_exists('truncate')) {
    function truncate(string $tableName): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

if (! function_exists('getRolesData')) {
    function getRolesData(): array
    {
        return [
            'admin',
            'user',
        ];
    }
}

if (! function_exists('getPermissionsData')) {
    function getPermissionsData(): array
    {
        return [
            'create_admin',
            'edit_admin',
            'view_admin',
            'delete_admin',
            'create_user',
            'edit_user',
            'view_user',
            'delete_user',
        ];
    }
}

if (! function_exists('stringify')) {
    function stringify(mixed $value): string
    {
        return (string) $value;
    }
}

if (! function_exists('nullify')) {
    function nullify(mixed $value): ?string
    {
        return trim($value) === '' ? null : $value;
    }
}
