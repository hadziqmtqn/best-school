<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use SoftDeletes, HasSlug, InteractsWithMedia;

    protected $fillable = [
        'slug',
        'title',
        'type',
        'content',
        'post_category_id',
        'user_id',
        'reviewed_by',
        'status',
        'visibility',
        'password',
        'allow_comment',
    ];

    protected function casts(): array
    {
        return [
            'allow_comment' => 'boolean',
        ];
    }

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

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function postCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }
}
