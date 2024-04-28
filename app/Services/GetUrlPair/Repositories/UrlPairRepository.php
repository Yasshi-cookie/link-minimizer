<?php

namespace App\Services\GetUrlPair\Repositories;

use App\Models\UrlPair;
use App\ValueObjects\MinimizedUrl;

class UrlPairRepository
{
    /**
     * @param MinimizedUrl $minimizedUrl
     * @return UrlPair|null
     */
    public function findByMinimizedUrl(MinimizedUrl $minimizedUrl): ?UrlPair
    {
        return UrlPair::whereMinimizedUrl($minimizedUrl->getValue())->first();
    }
}
