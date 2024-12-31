<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum PaymentMethod: string
{
    use BasicEnumFeatures;

    case CASH = 'cash';
    case CREDIT_CARD = 'credit_card';
    case DEBIT_CARD = 'debit_card';
    case BANK_TRANSFER = 'bank_transfer';
    case PAYPAL = 'paypal';
    case UPI = 'upi';
}
