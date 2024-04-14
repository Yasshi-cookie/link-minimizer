<?php

namespace App\Services\StoreUrlPair;

use App\Models\UrlPair;
use App\Services\StoreUrlPair\Repositories\UrlPairRepository;
use App\ValueObjects\OriginalUrl;

class StoreUrlPairService
{
    public function __construct(
        private readonly UrlPairRepository $urlPairRepository
    ) {
    }

    /**
     * 指定された$longUrlが存在しなければ、保存してそのUrlPairを返し
     * 存在すればそのUrlPairを返す
     *
     * @param  OriginalUrl $longUrl
     * @return UrlPair
     */
    public function storeIfNotExist(OriginalUrl $longUrl): UrlPair
    {
        $urlPair = $this->urlPairRepository
            ->getByOriginalUrl($longUrl)
            ->first();

        if (!is_null($urlPair)) {
            return $urlPair;
        }

        return $this->urlPairRepository->store($longUrl);
    }
}
