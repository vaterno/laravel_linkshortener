<?php

namespace App\Services\StringShorter\Exceptions;

class WrongLengthOfGeneratorLengthException extends \Exception
{
    public function __construct(string $message = "Wrong length of generator length", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
