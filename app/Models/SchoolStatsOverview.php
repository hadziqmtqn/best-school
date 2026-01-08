<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolStatsOverview extends Model
{
    use SoftDeletes;

    protected $table = 'school_stats_overviews';

    protected $fillable = [
        'slug',
        'school_year_id',
        'institution_id',
        'number_of_teachers',
        'number_of_students',
        'number_of_classrooms',
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
            'deleted_at' => 'timestime'
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (SchoolStatsOverview $schoolStatsOverview) {
            $schoolStatsOverview->slug = Str::uuid()->toString();
        });
    }

    // TODO RELATIONSHIP
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
