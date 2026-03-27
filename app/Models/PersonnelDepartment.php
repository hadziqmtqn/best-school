<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class PersonnelDepartment extends Model
{
    use SoftDeletes, HasSlug, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'level',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
            'deleted_at' => 'timestamp'
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
