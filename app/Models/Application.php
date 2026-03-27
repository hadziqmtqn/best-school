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
        'motto',
        'description',
        'phone_number',
        'email',
        'address',
        'social_media',
        'theme_color',
        'more_info'
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
            'social_media' => 'array',
            'more_info' => 'array'
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

    protected function bannerImage(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasMedia('banner') ? $this->getFirstMediaUrl('banner') : 'https://hadziqmtqn.github.io/new-bs-theme/assets/hero-1.png',
        );
    }
}
