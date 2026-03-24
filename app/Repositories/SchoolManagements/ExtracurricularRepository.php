<?php

namespace App\Repositories\SchoolManagements;

use App\Models\Extracurricular;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Builder;

class ExtracurricularRepository
{
    public function index(?string $institutuionSlug): array
    {
        $institutuion = Institution::query()
            ->when($institutuionSlug, fn(Builder $query) => $query->filterBySlug($institutuionSlug))
            ->first();

        return Extracurricular::query()
            ->with('institution')
            ->institutionId($institutuion?->id)
            ->get()
            ->map(function (Extracurricular $extracurricular) {
                return [
                    'name' => $extracurricular->name,
                    'description' => $extracurricular->description,
                    'galleries' => $extracurricular->getMedia('images')->map(function ($media) {
                        return $media->getUrl();
                    })->toArray()
                ];
            })
            ->toArray();
    }
}
