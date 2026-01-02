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
        return $user->can('ViewAny:EmployeePosition');
    }

    public function view(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('View:EmployeePosition', $employeePosition);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:EmployeePosition');
    }

    public function update(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('Update:EmployeePosition', $employeePosition);
    }

    public function delete(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('Delete:EmployeePosition', $employeePosition);
    }

    public function restore(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('Restore:EmployeePosition', $employeePosition);
    }

    public function forceDelete(User $user, EmployeePosition $employeePosition): bool
    {
        return $user->can('ForceDelete:EmployeePosition', $employeePosition);
    }
}
