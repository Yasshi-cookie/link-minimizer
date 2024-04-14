<?php

namespace App\ValueObjects;

use App\ValueObjects\Traits\GetStringValue;
use Illuminate\Support\Stringable;
use Illuminate\Support\Str;

/**
 * 短縮URL
 */
class MinimizedUrl extends Stringable
{
    use GetStringValue;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function getFullUrl(): string
    {
        return config('app.api_url') . '/go/' . $this->value;
    }
}
