<?php

use App\Constants\Routes;
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

if (! function_exists('getComparisonQuery')) {
    function getComparisonQuery(string $string): false|array
    {
        $arr = explode(' ', $string);

        /*
        |--------------------------------------------------------------------------
        | Check if the string is not in the correct format
        |--------------------------------------------------------------------------
        */
        if (count($arr) !== 3) {
            return false;
        }

        $field = trim($arr[0]);

        /*
        |--------------------------------------------------------------------------
        | Check if the field is not allowed
        |--------------------------------------------------------------------------
        */
        if (! in_array($field, ['type', 'amount', 'expense_category_id', 'description', 'date'])) {
            return false;
        }

        $operator = trim($arr[1]);
        $value = trim($arr[2]);

        return match ($operator) {
            '==' => [$field, '=', $value],
            '!=' => [$field, '!=', $value],
            '<' => [$field, '<', $value],
            '<=' => [$field, '<=', $value],
            '>' => [$field, '>', $value],
            '>=' => [$field, '>=', $value],
            default => false,
        };
    }
}

if (! function_exists('getRoutes')) {
    function getRoutes(?string $route = null): ?array
    {
        $routes = new Routes;

        if (! $route) {
            return $routes->getAll();
        }

        if (method_exists($routes, $route)) {
            return $routes->{$route}();
        }

        return null;
    }
}

if (! function_exists('isActiveRoute')) {
    function isActiveRoute(array|string $routeName, string $output = 'active'): string
    {
        if (is_array($routeName)) {
            foreach ($routeName as $name) {
                if (request()->routeIs($name)) {
                    return $output;
                }
            }

            return '';
        }

        return request()->routeIs($routeName) ? $output : '';
    }
}
