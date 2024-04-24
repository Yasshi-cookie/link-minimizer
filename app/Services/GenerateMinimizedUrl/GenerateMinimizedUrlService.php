<?php

namespace App\Services\GenerateMinimizedUrl;

use App\Services\GenerateMinimizedUrl\Exceptions\FailToGenerateMinimizedUrlException;
use App\ValueObjects\Bases\NaturalNumberValueObject;
use App\ValueObjects\MinimizedUrl;
use Illuminate\Support\Facades\Log;
use OutOfRangeException;

class GenerateMinimizedUrlService
{
    // prettier-ignore
    private const CHARS = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    /**
     * @param NaturalNumberValueObject $number
     * @return MinimizedUrl
     * @throws FailToGenerateMinimizedUrlException
     */
    public function generateFromUrlPairId(
        NaturalNumberValueObject $number
    ): MinimizedUrl {
        try {
            $base62EncodedValue = $this->base62Encode($number);
        } catch (OutOfRangeException $e) {
            Log::error($e);
            throw new FailToGenerateMinimizedUrlException();
        }

        return new MinimizedUrl($base62EncodedValue);
    }

    /**
     * @param NaturalNumberValueObject $naturalNumber
     * @return string
     * @throws OutOfRangeException
     */
    private function base62Encode(
        NaturalNumberValueObject $naturalNumber
    ): string {
        $num = $naturalNumber->getValue();

        $response = '';

        while ($num > 0) {
            $remainder = $num % 62;
            $num = (int) ($num / 62);

            if (!isset(self::CHARS[$remainder])) {
                throw new OutOfRangeException('base62エンコードできない値です: ' . $remainder);
            }

            $response = self::CHARS[$remainder] . $response;
        }

        return $response;
    }
}
