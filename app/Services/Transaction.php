<?php

namespace App\Services;

use App\Models\Transaction as TransactionModel;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class Transaction
{
    public function __construct(public User $user) {}

    public function getAllTransactions(
        string $search = '',
        string $type = '',
        string $category = '',
        string $timeframe = ''
    ): LengthAwarePaginator {
        return TransactionModel::with('expenseCategory')
            ->where('user_id', $this->user->id)
            ->when($type, function ($query, $type) {
                return $query->where('type', $type);
            })
            ->when($category, function ($query, $category) {
                return $query->where('expense_category_id', $category);
            })
            ->when($search, function ($query, $search) {
                /*
                |--------------------------------------------------------------------------
                | @todo: add and operator
                | Example: type = debit and amount > 100 and amount < 200
                |--------------------------------------------------------------------------
                */
                $comparison = getComparisonQuery($search);
                
                if ($comparison) {
                    return $query->where($comparison[0], $comparison[1], $comparison[2]);
                }

                return $query->where('description', 'like', "%$search%")
                    ->orWhereHas('expenseCategory', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            })
            ->when($timeframe, function ($query, $timeframe) {
                return match ($timeframe) {
                    'today' => $query->whereDate('date', now()),
                    'yesterday' => $query->whereDate('date', now()->subDay()),
                    'this_week' => $query->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()]),
                    'last_week' => $query->whereBetween('date', [now()->startOfWeek()->subWeek(), now()->endOfWeek()->subWeek()]),
                    'this_month' => $query->whereMonth('date', now()->month),
                    'last_month' => $query->whereMonth('date', now()->subMonth()->month),
                    'this_year' => $query->whereYear('date', now()->year),
                    'last_year' => $query->whereYear('date', now()->subYear()->year),
                    default => $query->whereDate('date', now()->subDays($timeframe)),
                };
            })
            ->orderBy('date', 'desc')
            ->paginate(15);
    }
}
