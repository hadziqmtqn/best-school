<?php

namespace App\Repositories\References;

use App\Models\EducationalLevel;

class EducationalLevelRepository
{
    public static function options(): array
    {
        return EducationalLevel::get()
            ->mapWithKeys(function (EducationalLevel $educationalLevel) {
                return [$educationalLevel->id => [
                    'fullName' => $educationalLevel->full_name,
                    'shortName' => $educationalLevel->short_name
                ]];
            })
            ->toArray();
    }
}