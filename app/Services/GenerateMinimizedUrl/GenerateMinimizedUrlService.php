<?php

namespace App\Services\GenerateMinimizedUrl;

use App\ValueObjects\Bases\NaturalNumberValueObject;
use App\ValueObjects\MinimizedUrl;
use App\ValueObjects\UrlPairId;

class GenerateMinimizedUrlService
{
    private const CHARS = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    /**
     * @param UrlPairId $urlPairId
     * @return MinimizedUrl
     */
    public function generateFromUrlPairId(UrlPairId $urlPairId): MinimizedUrl
    {
        $base62EncodedValue = $this->base62Encode($urlPairId);

        return new MinimizedUrl($base62EncodedValue);
    }

    /**
     * @param NaturalNumberValueObject $naturalNumber
     * @return string
     */
    private function base62Encode(
        NaturalNumberValueObject $naturalNumber
    ): string {
        $num = $naturalNumber->getValue();

        $response = '';

        while ($num > 0) {
            $remainder = $num % 62;
            $num = (int) ($num / 62);
            $response = self::CHARS[$remainder] . $response;
        }

        return $response;
    }
}
