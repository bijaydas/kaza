<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum PaymentMethod: string
{
    use BasicEnumFeatures;

    case CASH = 'cash';
    case CREDIT_CARD = 'credit_card';
    case DEBIT_CARD = 'debit_card';
    case PAYPAL = 'paypal';
    case PHONE_PE = 'phone_pe';
    case UPI = 'upi';

    public static function getOptions(): array
    {
        return [
            self::CASH->value => 'Cash',
            self::CREDIT_CARD->value => 'Credit Card',
            self::DEBIT_CARD->value => 'Debit Card',
            self::PAYPAL->value => 'Paypal',
            self::PHONE_PE->value => 'PhonePe',
            self::UPI->value => 'UPI',
        ];
    }
}
