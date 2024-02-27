<?php

namespace App\Services\StringShorter;

use App\Services\StringShorter\ShorterProviders\ShorterProviderInterface;
use App\Services\StringShorter\Exceptions\WrongLengthOfGeneratorLengthException;

/**
 * Its an "abstract" service for make short code from string.
 */
class StringShorterService
{
    public function __construct(
        protected ShorterProviderInterface $shorterProvider
    ) {
    }

    /**
     * @param string $url
     * @param int $generatorLength
     * @return string
     *
     * @throws WrongLengthOfGeneratorLengthException
     */
    public function makeShorterCode(string $string, int $generatorLength = 5): string
    {
        if ($generatorLength <= 4) {
            throw new WrongLengthOfGeneratorLengthException();
        }

        return $this->shorterProvider->make($string, $generatorLength);
    }
}
