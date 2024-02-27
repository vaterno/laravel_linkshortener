<?php

namespace App\Services\UrlShorter\Repositories;

use App\Services\UrlShorter\Models\UrlShorter;
use App\Services\UrlShorter\Models\UrlShorterClickLog;

class UrlShorterClickLogRepository
{
    public function save(UrlShorterClickLog $urlShorterClickLog): UrlShorterClickLog
    {
        $urlShorterClickLog->save();
        return $urlShorterClickLog;
    }

    public function getCountClicksByShortcode(string $shortcode): ?int
    {
        return UrlShorter::query()
            ->join('url_shorter_click_logs', 'url_shorters.id', 'url_shorter_click_logs.url_shorter_id')
            ->where([
                'shortcode' => $shortcode,
            ])->count();
    }
}
