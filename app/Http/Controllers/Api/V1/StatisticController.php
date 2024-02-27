<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\UrlShorter\Repositories\UrlShorterClickLogRepository;
use Illuminate\Support\Facades\Response;

class StatisticController extends Controller
{
    public function getCountRedirects(
        string $shortcode,
        UrlShorterClickLogRepository $urlShorterClickLogRepository
    ) {
        try {
            $count = $urlShorterClickLogRepository->getCountClicksByShortcode($shortcode);

            return Response::json([
                'data' => [
                    'count' => $count,
                ],
            ]);
        } catch (\Throwable $e) {
            return Response::json([
                'message' => $e->getMessage(),
                'errors' => [
                    $e->getMessage(),
                ]
            ]);
        }
    }
}
