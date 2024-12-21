<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum UserStatusEnum: string
{
    use BasicEnumFeatures;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
