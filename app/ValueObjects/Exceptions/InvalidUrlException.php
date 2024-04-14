<?php

namespace App\ValueObjects\Exceptions;

use Exception;

class InvalidUrlException extends Exception
{
    public function __construct($code = 0, \Throwable $previous = null) {
        parent::__construct('不正なURLです。', $code, $previous);
    }
}
