<?php

namespace App\Traits;

trait BasicEnumFeatures
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function keys(): array
    {
        return array_column(static::cases(), 'name');
    }

    public static function data(): array
    {
        return array_combine(static::keys(), static::values());
    }

    public static function isValidKey(string $key): bool
    {
        return in_array(strtoupper($key), static::keys());
    }

    public static function isValidValue(string $value): bool
    {
        return in_array(strtolower($value), static::values());
    }

    public static function find(string $key): ?string
    {
        $data = static::data();

        return $data[strtoupper($key)] ?? null;
    }
}
