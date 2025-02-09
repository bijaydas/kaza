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
                'icon' => 'heroicon-c-plus',
            ],
            [
                'name' => 'Home',
                'path' => route('transactions.index'),
                'is_active' => true,
                'icon' => 'heroicon-s-home',
            ],
            [
                'name' => 'Analytics',
                'path' => route('transactions.analytics.home'),
                'is_active' => true,
                'icon' => 'heroicon-c-presentation-chart-line',
            ],
            [
                'name' => 'Deleted',
                'path' => '#',
                'is_active' => true,
                'icon' => 'heroicon-s-trash',
            ],
        ];
    }
}
