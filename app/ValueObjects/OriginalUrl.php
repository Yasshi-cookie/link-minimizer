<?php

namespace App\ValueObjects;

use App\ValueObjects\Exceptions\InvalidUrlException;
use App\ValueObjects\Traits\GetStringValue;
use Illuminate\Support\Stringable;
use Illuminate\Support\Str;

class OriginalUrl extends Stringable
{
    use GetStringValue;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->assertValidUrl($url);

        parent::__construct($url);
    }

    /**
     * @param string $url
     * @return true
     */
    private function assertValidUrl(string $url): true
    {
        if (!Str::isUrl($url, ['http', 'https'])) {
            throw new InvalidUrlException();
        }

        return true;
    }
}
