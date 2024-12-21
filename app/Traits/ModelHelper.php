<?php

namespace App\Traits;

trait ModelHelper
{
    private function getDate(string $column, string $format = 'Y-m-d'): ?string
    {
        if (! isset($this[$column]) || empty($this[$column]) || is_null($this[$column]) || ! $this[$column] instanceof \DateTime) {
            return null;
        }
        return $this[$column]->format($format);
    }

    public function birthday(): ?string
    {
        return $this->getDate('date_of_birth');
    }

    public function anniversary(): ?string
    {
        return $this->getDate('anniversary_date');
    }
}