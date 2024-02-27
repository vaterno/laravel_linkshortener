<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\MakeShorterRequest;
use App\Services\UrlShorter\Models\UrlShorter;
use App\Services\UrlShorter\UrlShorterService;

class ShortenerController extends Controller
{
    /**
     * Create new shortcode for url
     *
     * @param MakeShorterRequest $request
     * @param UrlShorterService $urlShorterService
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(
        MakeShorterRequest $request,
        UrlShorterService $urlShorterService
    ) {
        try {
            /** @var UrlShorter $urlShorter */
            $urlShorter = $urlShorterService->makeOrFind(
                $request->get('url')
            );

            return Response::json([
                'data' => [
                    'url' => URL::to($urlShorter->shortcode),
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
