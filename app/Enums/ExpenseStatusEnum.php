<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum ExpenseStatusEnum: string
{
    use BasicEnumFeatures;

    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
