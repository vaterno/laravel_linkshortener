<?php

namespace App\Services\UrlShorter\Repositories;

use App\Services\UrlShorter\Models\UrlShorter;
use Illuminate\Database\Eloquent\Model;

class UrlShorterRepository
{
    /**
     * @param UrlShorter $urlShorter
     * @return UrlShorter
     */
    public function findByUrlOrCreate(UrlShorter $urlShorter): UrlShorter|Model
    {
        $urlShorterResult = $this->findByUrl($urlShorter->url);

        if (
            !empty($urlShorterResult) &&
            !empty($urlShorterResult->id)
        ) {
            return $urlShorterResult;
        }

        $urlShorter->save();

        return $urlShorter;
    }

    /**
     * @param string $url
     * @return UrlShorter|null
     */
    public function findByUrl(string $url): ?UrlShorter
    {
        return UrlShorter::query()->where([
            'url' => $url,
        ])->first();
    }

    /**
     * @param string $shortcode
     * @return UrlShorter|Model
     */
    public function findOrFailByShortcode(string $shortcode): UrlShorter|Model
    {
        return UrlShorter::query()->where([
            'shortcode' => $shortcode,
        ])->firstOrFail();
    }
}
