<?php

namespace App\Policies;

use App\Models\EmployeePosition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePositionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAnyEmployeePosition');
    }

    public function view(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('ViewEmployeePosition', $employeePosition);
    }

    public function create(User $user): bool
    {
        return $user->can('CreateEmployeePosition');
    }

    public function update(User $user, EmployeePosition $employeePosition): bool
    {
        $employeePosition->loadMissing('user');

        return $user->can('UpdateEmployeePosition') && $employeePosition->user?->is_active;
    }

    public function delete(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('DeleteEmployeePosition', $employeePosition);
    }

    public function restore(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('RestoreEmployeePosition', $employeePosition);
    }

    public function forceDelete(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('ForceDeleteEmployeePosition', $employeePosition);
    }
}
