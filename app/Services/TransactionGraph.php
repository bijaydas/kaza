<?php

namespace App\Services;

use App\Models\Transaction as TransactionModel;
use App\Models\User as UserModel;

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
            ->get();
    }

    public function customYear(string $year)
    {
        return TransactionModel::selectRaw('YEAR(date) as year, ROUND(SUM(amount)) as totalExpense')
            ->whereYear('date', $year)
            ->groupBy('year')
            ->get();
    }
}
