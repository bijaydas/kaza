<?php

namespace App\Traits;

trait AdminRoute
{
    public function getAllAdmin(): array
    {
        return [
            [
                'name' => 'Manage Users',
                'path' => route('admin.users'),
                'is_active' => true,
                'icon' => 'heroicon-c-users',
            ],
        ];
    }
}
