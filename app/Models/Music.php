<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Music extends Model
{
    protected $table = 'music';

   protected $fillable = [
    'title',
    'type',
    'artist',
    'image',
    'year',
    'spotify_link',
    'apple_link',
    'audiomack_link',
    'amazon_link',
    'youtudemusic_link',
    'boomplay_link',
     ];

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function smartLink(): HasOne
    {
        return $this->hasOne(SmartLink::class);
    }
}
