<?php

namespace App\Services\UrlShorter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShorterClickLog extends Model
{
    protected $fillable = [
        'url_shorter_id',
    ];
}
