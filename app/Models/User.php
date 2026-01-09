<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasSlug, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean'
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('username');
    }

    public function getRouteKeyName(): string
    {
        return 'username';
    }

    // TODO RELATIONSHIP
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'user_id');
    }

    public function employeePositions(): HasMany
    {
        return $this->hasMany(EmployeePosition::class, 'user_id');
    }

    public function homebases(): HasMany
    {
        return $this->hasMany(Homebase::class, 'user_id');
    }

    public function homebaseActive(): HasOne
    {
        return $this->hasOne(Homebase::class, 'user_id')
            ->where('is_active', true);
    }

    public function employeePositionActive(): HasOne
    {
        return $this->hasOne(EmployeePosition::class, 'user_id')
            ->where('is_active', true);
    }

    public function educationalHistories(): HasMany
    {
        return $this->hasMany(EducationalHistory::class, 'user_id');
    }

    // TODO ATTRIBUTES
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->hasMedia('avatar')
                ? $this->getFirstTemporaryUrl(now()->addHour(), 'avatar')
                : 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&size=128&background=00bb00&color=ffffff&rounded=true',
        );
    }
}
