<?php

function getTitle(?string $title): string
{
    return config('app.name').' | '.$title ?? 'Title not set';
}
