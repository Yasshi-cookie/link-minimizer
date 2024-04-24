<?php

namespace App\Services\GenerateMinimizedUrl\Exceptions;

use Exception;

class FailToGenerateMinimizedUrlException extends Exception
{
    public function __construct($code = 0, \Throwable $previous = null)
    {
        parent::__construct(
            '短縮URLの生成に失敗しました',
            $code,
            $previous
        );
    }
}
