<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum Role: string
{
    use BasicEnumFeatures;

    case USER = 'user';
    case ADMIN = 'admin';
}
