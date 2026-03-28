<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Institution extends Model implements HasMedia
{
    use SoftDeletes, HasSlug, InteractsWithMedia;

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
        'profile',
        'status',
        'school_establishment_decree',
        'date_establishment_decree',
        'operational_permit_decree',
        'date_operational_permit_decree',
        'more_info'
    ];

    protected function casts(): array
    {
        return [
            'more_info' => 'array'
        ];
    }

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

    // TODO RELATIONSHIP
    public function educationalLevel(): BelongsTo
    {
        return $this->belongsTo(EducationalLevel::class);
    }

    public function homebases(): HasMany
    {
        return $this->hasMany(Homebase::class, 'institution_id');
    }

    public function employeePositions(): HasMany
    {
        return $this->hasMany(EmployeePosition::class, 'institution_id');
    }

    // TODO ATTRIBUTES
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasMedia('logo') ? $this->getFirstMediaUrl('logo') : null,
        );
    }

    // TODO SCOPES
    #[Scope]
    protected function filterBySlug(Builder $query, $slug): Builder
    {
        return $query->where('slug', $slug);
    }
}
