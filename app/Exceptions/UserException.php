<?php

namespace App\Exceptions;

class UserException extends GeneralException
{
    public static function alreadyExists(): self
    {
        return new static('User already exists!');
    }
}
