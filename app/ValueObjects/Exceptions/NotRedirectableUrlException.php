<?php

namespace App\ValueObjects\Exceptions;

use Exception;

class NotRedirectableUrlException extends Exception
{
    public function __construct($code = 0, \Throwable $previous = null) {
        parent::__construct('リダイレクトできないURLです。', $code, $previous);
    }
}
