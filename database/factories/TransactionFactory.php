<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'expense_category_id' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]),
            'user_id' => 1,
            'type' => Arr::random(['debit', 'credit']),
            'amount' => $this->faker->randomFloat(2, 1, 95000),
            'date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'payment_method' => 'upi',
        ];
    }
}
