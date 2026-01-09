<?php

namespace App\Repositories\SchoolManagements;

use App\Models\SchoolYear;

class SchoolYearRepository
{
    public static function options(): array
    {
        return SchoolYear::query()
            ->get()
            ->mapWithKeys(fn(SchoolYear $schoolYear) => [$schoolYear->id => $schoolYear->year])
            ->toArray();
    }
}
