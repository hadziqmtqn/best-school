<?php

namespace App\Repositories\SchoolManagements;

use App\Models\Extracurricular;
use App\Models\Institution;

class ExtracurricularRepository
{
    public function index(Institution $institution): array
    {
        return Extracurricular::query()
            ->with('institution')
            ->institutionId($institution->id)
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
