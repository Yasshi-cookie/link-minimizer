<?php

namespace App\ValueObjects\Bases;

use App\ValueObjects\Bases\Exceptions\InvalidNaturalNumberException;
use App\ValueObjects\Traits\GetIntegerValue;

abstract class NaturalNumberValueObject
{
    use GetIntegerValue;

    protected int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->assertValidValue($value);

        $this->value = $value;
    }

    /**
     * @param integer $value
     * @return true
     * @throws InvalidNaturalNumberException $valueが0以下の場合
     */
    protected function assertValidValue(int $value): true
    {
        if ($value <= 0) {
            throw new InvalidNaturalNumberException();
        }

        return true;
    }
}
