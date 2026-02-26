<?php

namespace App\Repositories\References;

use App\Models\EducationalLevel;

class EducationalLevelRepository
{
    public function options(): array
    {
        return EducationalLevel::query()
            ->get()
            ->mapWithKeys(function (EducationalLevel $educationalLevel) {
                return [$educationalLevel->id => [
                    'fullName' => $educationalLevel->full_name,
                    'shortName' => $educationalLevel->short_name
                ]];
            })
            ->toArray();
    }
}
