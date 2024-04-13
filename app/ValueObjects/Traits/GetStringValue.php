<?php

namespace App\ValueObjects\Traits;

trait GetStringValue
{
    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
