<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Application extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'slug',
        'name',
        'short_name',
        'description',
        'phone_number',
        'email'
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
        ];
    }

    // TODO ATTRIBUTE
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasMedia('logo') ? $this->getFirstMediaUrl('logo') : 'https://s3.bkn.my.id/master/school.webp',
        );
    }
}
