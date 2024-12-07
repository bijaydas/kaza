<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum RoleEnum: string
{
    use BasicEnumFeatures;

    case ADMIN = 'admin';
    case USER = 'user';
}
