<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Food',
            'Transportation',
            'Utilities',
            'Rent',
            'Health',
            'Education',
            'Entertainment',
            'Clothing',
            'Insurance',
            'Savings',
            'Others',
            'Fruits',
            'Vegetables',
            'Dairy',
        ];

        foreach ($categories as $category) {
            \App\Models\ExpenseCategory::create([
                'name' => $category,
            ]);
        }
    }
}
