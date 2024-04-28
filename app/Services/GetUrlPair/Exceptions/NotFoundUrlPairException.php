<?php

namespace App\Services\GetUrlPair\Exceptions;

use Exception;

class NotFoundUrlPairException extends Exception
{
    public function __construct($code = 0, \Throwable $previous = null)
    {
        parent::__construct(
            'UrlPairが見つかりませんでした',
            $code,
            $previous
        );
    }
}
