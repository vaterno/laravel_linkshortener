<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ShortenerRedirectEvent;
use App\Services\UrlShorter\Models\UrlShorter;
use App\Services\UrlShorter\Repositories\UrlShorterRepository;

class ShortenerController extends Controller
{
    /**
     * Redirect by shortcode
     *
     * @param Request $request
     * @param UrlShorterRepository $urlShorterRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirect(
        Request $request,
        UrlShorterRepository $urlShorterRepository
    ) {
        /** @var UrlShorter $urlShorter */
        $urlShorter = $urlShorterRepository->findOrFailByShortcode($request->decodedPath());
        $redirect = redirect($urlShorter->url);

        ShortenerRedirectEvent::dispatch($urlShorter->id);

        return $redirect;
    }
}
