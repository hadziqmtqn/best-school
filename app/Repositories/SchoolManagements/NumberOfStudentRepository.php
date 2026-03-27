<?php

namespace App\Repositories\SchoolManagements;

use App\Models\NumberOfStudent;
use Illuminate\Database\Eloquent\Builder;

class NumberOfStudentRepository
{
    private function index(): Builder
    {
        return NumberOfStudent::query()
            ->whereHas('employeePosition.schoolYear', fn($query) => $query->active());
    }

    public function totalStudents(): int
    {
        return $this->index()->sum('amount');
    }

    public function totalClassrooms(): int
    {
        return $this->index()->count();
    }
}
