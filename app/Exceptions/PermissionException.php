<?php

namespace App\Exceptions;

class PermissionException extends GeneralException
{
    public static function notSetup(): self
    {
        return new self('PermissionCommand is not setup.', 403);
    }
}
