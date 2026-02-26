<?php

namespace App\Repositories\SchoolManagements;

use App\Models\NumberOfStudent;

class NumberOfStudentRepository
{
    public function total(): int
    {
        return NumberOfStudent::query()
            ->whereHas('employeePosition.schoolYear', fn($query) => $query->active())
            ->sum('amount');
    }
}
