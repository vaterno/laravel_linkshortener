<?php

namespace App\Services\UrlShorter\Models;

use Illuminate\Database\Eloquent\Model;

class UrlShorter extends Model
{
    protected $fillable = [
        'url',
        'shortcode',
    ];
}
