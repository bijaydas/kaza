<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum AccountStatus: string
{
    use BasicEnumFeatures;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case UNDER_REVIEW = 'under_review';
}
