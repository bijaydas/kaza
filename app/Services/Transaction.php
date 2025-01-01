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
        string $category = ''
    ): LengthAwarePaginator
    {
        return TransactionModel::with('expenseCategory')
            ->where('user_id', $this->user->id)
            ->when($type, function ($query, $type) {
                return $query->where('type', $type);
            })
            ->when($category, function ($query, $category) {
                return $query->where('expense_category_id', $category);
            })
            ->when($search, function ($query, $search) {
                return $query->where('description', 'like', "%$search%")
                    ->orWhereHas('expenseCategory', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            })
            ->orderBy('date', 'desc')
            ->paginate(15);
    }
}
