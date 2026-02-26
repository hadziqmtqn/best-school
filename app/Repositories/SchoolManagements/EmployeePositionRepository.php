<?php

namespace App\Repositories\SchoolManagements;

use App\Models\EmployeePosition;

class EmployeePositionRepository
{
    public function options($schoolYearId, $institutionId, $personnelDepartmentId): array
    {
        return EmployeePosition::query()
            ->with([
                'user',
                'personnelDepartment'
            ])
            ->whereHas('user', fn($query) => $query->whereNull('deleted_at')->where('is_active', true))
            ->where([
                'school_year_id' => $schoolYearId,
                'institution_id' => $institutionId,
                'personnel_department_id' => $personnelDepartmentId
            ])
            ->get()
            ->mapWithKeys(function (EmployeePosition $employeePosition) {
                return [$employeePosition->id => [
                    'personnelDepartment' => $employeePosition->personnelDepartment?->name,
                    'employeeName' => $employeePosition->user?->name
                ]];
            })
            ->toArray();
    }
}
