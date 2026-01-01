<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Institution extends Model
{
    use SoftDeletes, HasSlug;

    protected $fillable = [
        'slug',
        'name',
        'educational_level_id',
        'npsn',
        'email',
        'phone_number',
        'province',
        'city',
        'district',
        'village',
        'street',
        'postal_code',
    ];

    public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
