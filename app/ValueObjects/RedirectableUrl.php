<?php

namespace App\ValueObjects;

use App\ValueObjects\Exceptions\NotRedirectableUrlException;
use App\ValueObjects\Traits\GetStringValue;
use Illuminate\Support\Stringable;
use Illuminate\Support\Str;

/**
 * リダイレクト可能なUrl
 */
class RedirectableUrl extends Stringable
{
    use GetStringValue;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->assertRedirectableUrl($url);

        parent::__construct($url);
    }

    /**
     * @param string $url
     * @return true
     */
    private function assertRedirectableUrl(string $url): true
    {
        if (! Str::isUrl($url, ['http', 'https'])) {
            throw new NotRedirectableUrlException();
        }

        return true;
    }
}
