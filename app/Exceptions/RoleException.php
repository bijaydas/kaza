<?php

namespace App\Exceptions;

class RoleException extends GeneralException
{
    public static function notFound(string $role): self
    {
        return new self("Invalid role: {$role}", 404);
    }
}
