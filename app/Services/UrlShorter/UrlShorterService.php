<?php

namespace App\Services\UrlShorter;

use Illuminate\Support\Str;
use App\Services\UrlShorter\Models\UrlShorter;
use App\Services\StringShorter\StringShorterService;
use App\Services\UrlShorter\Exceptions\IsNotUrlException;
use App\Services\UrlShorter\Repositories\UrlShorterRepository;

class UrlShorterService
{
    public function __construct(
        protected StringShorterService $stringShorterService,
        protected UrlShorterRepository $urlShorterRepository
    ) {
    }

    public function makeOrFind(string $urlToShort, int $generatorLength = 5): UrlShorter
    {
        if (!Str::isUrl($urlToShort)) {
            throw new IsNotUrlException();
        }

        $shorterCode = $this->stringShorterService->makeShorterCode(
            $urlToShort,
            $generatorLength
        );

        return $this->urlShorterRepository->findByUrlOrCreate(new UrlShorter([
            'url' => $urlToShort,
            'shortcode' => $shorterCode,
        ]));
    }
}
