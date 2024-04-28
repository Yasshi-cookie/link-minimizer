<?php

namespace App\ValueObjects\Traits;

trait GetIntegerValue
{
    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
