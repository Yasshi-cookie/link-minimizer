<?php

namespace App\Services\StoreUrlPair\Exceptions;

use Exception;

class NotFoundUrlPairException extends Exception
{
    public function __construct($code = 0, \Throwable $previous = null)
    {
        parent::__construct(
            '短縮URLが見つかりませんでした。',
            $code,
            $previous
        );
    }
}
