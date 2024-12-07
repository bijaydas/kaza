<?php

use Illuminate\Support\Facades\DB;

function getTitle(?string $title): string
{
    return config('app.name').' | '.$title ?? 'Title not set';
}


if (! function_exists('truncate')) {
    function truncate(string $tableName): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}