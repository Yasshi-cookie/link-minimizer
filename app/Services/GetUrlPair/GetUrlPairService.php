<?php

namespace App\Services\GetUrlPair;

use App\Models\UrlPair;
use App\Services\GetUrlPair\Exceptions\NotFoundUrlPairException;
use App\Services\GetUrlPair\Repositories\UrlPairRepository;
use App\ValueObjects\MinimizedUrl;

class GetUrlPairService
{
    public function __construct(
        private readonly UrlPairRepository $urlPairRepository
    ) {
    }

    /**
     * @param MinimizedUrl $minimizedUrl
     * @return UrlPair
     * @throws NotFoundUrlPairException
     */
    public function findByMinimizedUrl(MinimizedUrl $minimizedUrl): UrlPair
    {
        $urlPair = $this->urlPairRepository
            ->findByMinimizedUrl($minimizedUrl);

        if (is_null($urlPair)) {
            throw new NotFoundUrlPairException();
        }

        return $urlPair;
    }
}
