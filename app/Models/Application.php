<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'email',
        'social_media'
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
            'social_media' => 'array'
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // TODO RELATIONSHIP
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'application_id');
    }

    // TODO ATTRIBUTE
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasMedia('logo') ? $this->getFirstMediaUrl('logo') : 'https://s3.bkn.my.id/master/school.webp',
        );
    }

    protected function breadcrumb(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasMedia('breadcrumb') ? $this->getFirstMediaUrl('breadcrumb') : 'https://raw.githubusercontent.com/Bekenweb/best-assets/refs/heads/main/breadcrumb/breadcrumb.png',
        );
    }

    protected function cta(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasMedia('cta') ? $this->getFirstMediaUrl('cta') : 'https://raw.githubusercontent.com/Bekenweb/best-assets/refs/heads/main/shapes/cta.png',
        );
    }
}
