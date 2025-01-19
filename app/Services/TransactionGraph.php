<?php

namespace App\Services;

use App\Models\Transaction as TransactionModel;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class TransactionGraph extends Transaction
{
    public function __construct(
        public UserModel $userModel
    ) {
        parent::__construct($userModel);
    }

    public function sinceBeginning()
    {
        return TransactionModel::selectRaw('YEAR(date) as year, ROUND(SUM(amount)) as totalExpense')
            ->groupBy('year')
            ->orderBy('year')
            ->get();
    }

    public function yearExpenses(string $year)
    {
        return TransactionModel::query()
            ->select(DB::raw('expense_categories.name AS category, ROUND(SUM(amount)) AS amount'))
            ->join('expense_categories', 'expense_categories.id', '=', 'transactions.expense_category_id')
            ->whereYear('date', '=', $year)
            ->groupBy('transactions.expense_category_id')
            ->get();
    }
}
