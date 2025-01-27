<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum UserStatus: string
{
    use BasicEnumFeatures;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
