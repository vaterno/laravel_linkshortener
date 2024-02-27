<?php

namespace App\Services\StringShorter\ShorterProviders;

class SimpleShorterProvider implements ShorterProviderInterface
{
    public function make(string $string, int $generatorLength): string
    {
        $hash = hash('sha256', $string . time());
        $result = mb_strtoupper(substr($hash, 0, $generatorLength));

        return $result;
    }
}
