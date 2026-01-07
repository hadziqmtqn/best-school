<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'institution_id',
        'name',
        'description',
        'type',
        'youtube_id',
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
        ];
    }
}
