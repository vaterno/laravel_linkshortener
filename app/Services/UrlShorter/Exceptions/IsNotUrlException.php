<?php

namespace App\Services\UrlShorter\Exceptions;

class IsNotUrlException extends \Exception
{
    public function __construct(string $message = 'Is not url', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
