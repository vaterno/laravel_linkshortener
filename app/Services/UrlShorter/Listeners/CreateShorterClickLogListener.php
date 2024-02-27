<?php

namespace App\Services\UrlShorter\Listeners;

use App\Events\ShortenerRedirectEvent;
use App\Services\UrlShorter\Models\UrlShorterClickLog;
use App\Services\UrlShorter\Repositories\UrlShorterClickLogRepository;

class CreateShorterClickLogListener
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected UrlShorterClickLogRepository $clickLogRepository
    )
    {
    }

    /**
     * Handle the event.
     */
    public function handle(ShortenerRedirectEvent $event): void
    {
        $this->clickLogRepository->save(new UrlShorterClickLog([
            'url_shorter_id' => $event->urlShorterId,
        ]));
    }
}
