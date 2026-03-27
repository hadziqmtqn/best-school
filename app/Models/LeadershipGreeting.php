<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class LeadershipGreeting extends Model
{
    use HasSlug;

    protected $fillable = [
        'slug',
        'title',
        'message',
        'user_id'
    ];

    public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    // TODO RELATIONSHIP
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
