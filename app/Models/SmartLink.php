<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmartLink extends Model
{
    protected $fillable = [
        'music_id',
        'slug',
        'headline',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function music(): BelongsTo
    {
        return $this->belongsTo(Music::class);
    }
}
