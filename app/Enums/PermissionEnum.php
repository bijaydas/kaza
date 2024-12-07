<?php

namespace App\Enums;

use App\Traits\BasicEnumFeatures;

enum PermissionEnum: string
{
    use BasicEnumFeatures;

    case CREATE_ADMIN = 'create_admin';
    case EDIT_ADMIN = 'edit_admin';
    case VIEW_ADMIN = 'view_admin';
    case DELETE_ADMIN = 'delete_admin';
    case CREATE_USER = 'create_user';
    case EDIT_USER = 'edit_user';
    case VIEW_USER = 'view_user';
    case DELETE_USER = 'delete_user';
}
