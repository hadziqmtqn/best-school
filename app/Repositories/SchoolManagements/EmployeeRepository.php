<?php

namespace App\Repositories\SchoolManagements;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;

class EmployeeRepository
{
    public function options($institutionId, $personnelDepartmentId): array
    {
        return Employee::query()
            ->with('user')
            ->whereHas('user', fn($query) => $query->whereNull('deleted_at'))
            ->whereHas('user.homebases', fn(Builder $query) => $query->where('institution_id', $institutionId))
            ->whereHas('user.employeePositions', fn(Builder $query) => $query->where('personnel_department_id', $personnelDepartmentId))
            ->get()
            ->mapWithKeys(fn(Employee $employee) => [$employee->user_id => $employee->user?->name])
            ->toArray();
    }
}
