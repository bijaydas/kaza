<?php

namespace App\Constants;

class Routes
{
    public function getAll(): array
    {
        return [
            'transactions' => $this->transactions(),
        ];
    }

    public function transactions(): array
    {
        return [
            [
                'name' => 'Create',
                'path' => route('transactions.create'),
                'is_active' => true,
                'icon' => 'heroicon-o-plus',
            ],
            [
                'name' => 'Home',
                'path' => route('transactions.index'),
                'is_active' => true,
                'icon' => 'heroicon-s-home',
            ],
            [
                'name' => 'Deleted',
                'path' => '#',
                'is_active' => false,
                'icon' => 'heroicon-o-trash',
            ],
        ];
    }
}
