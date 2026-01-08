<?php

namespace App\Repositories\References;

use App\Models\PersonnelDepartment;

class PersonnelDepartmentRepository
{
    public static function options(): array
    {
        return PersonnelDepartment::query()
            ->get()
            ->mapWithKeys(fn(PersonnelDepartment $personnelDepartment) => [$personnelDepartment->id => $personnelDepartment->name])
            ->toArray();
    }
}