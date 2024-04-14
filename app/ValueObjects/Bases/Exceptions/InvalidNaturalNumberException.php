<?php

namespace App\ValueObjects\Bases\Exceptions;

use Exception;

class InvalidNaturalNumberException extends Exception
{
    public function __construct($code = 0, \Throwable $previous = null)
    {
        parent::__construct('自然数ではありません。', $code, $previous);
    }
}
