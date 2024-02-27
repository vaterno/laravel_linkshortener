<?php

namespace App\Services\StringShorter\ShorterProviders;

interface ShorterProviderInterface
{
    /**
     * @param string $string
     * @param int $generatorLength
     *
     * @return string
     */
    public function make(string $string, int $generatorLength): string;
}
