<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    ShortenerController,
    StatisticController
};

Route::post('/shorter', [ShortenerController::class, 'create']);

Route::get('/count-redirects/{shortcode}', [StatisticController::class, 'getCountRedirects'])
    ->where('shortcode', '([a-zA-Z0-9]{' . config('linkshorter.generator_length') . '})');
