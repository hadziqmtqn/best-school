<?php

namespace App\Repositories\SchoolManagements;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;

class EmployeeRepository
{
    private function index(?int $institutionId = null, ?int $personnelDepartmentId = null): Builder
    {
        $employees = Employee::query()
            ->with('user')
            ->whereHas('user', fn($query) => $query->whereNull('deleted_at'));

        if ($institutionId) {
            $employees->whereHas('user.homebases', fn(Builder $query) => $query->where('institution_id', $institutionId));
        }

        $employees->whereHas('user.employeePositions', function (Builder $query) use ($personnelDepartmentId) {
            $query->whereHas('schoolYear', fn($query) => $query->active());

            if ($personnelDepartmentId) {
                $query->where('personnel_department_id', $personnelDepartmentId);
            }
        });

        return $employees;
    }

    public function options($institutionId, $personnelDepartmentId): array
    {
        return $this->index(institutionId: (int) $institutionId, personnelDepartmentId: (int) $personnelDepartmentId)
            ->get()
            ->mapWithKeys(fn(Employee $employee) => [$employee->user_id => $employee->user?->name])
            ->toArray();
    }

    public function totalActiveEmployees(): int
    {
        return $this->index()->count();
    }
}
