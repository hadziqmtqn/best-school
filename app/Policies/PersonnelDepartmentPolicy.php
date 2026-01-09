<?php

namespace App\Policies;

use App\Models\PersonnelDepartment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonnelDepartmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:PersonnelDepartment');
    }

    public function view(User $user, PersonnelDepartment $personnelDepartment): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return $user->can('Create:PersonnelDepartment');
    }

    public function update(User $user, PersonnelDepartment $personnelDepartment): bool
    {
        return $user->can('Update:PersonnelDepartment', $personnelDepartment);
    }

    public function delete(User $user, PersonnelDepartment $personnelDepartment): bool
    {
        return $user->can('Delete:PersonnelDepartment', $personnelDepartment);
    }

    public function restore(User $user, PersonnelDepartment $personnelDepartment): bool
    {
        return $user->can('Restore:PersonnelDepartment', $personnelDepartment);
    }

    public function forceDelete(User $user, PersonnelDepartment $personnelDepartment): bool
    {
        return $user->can('ForceDelete:PersonnelDepartment', $personnelDepartment);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:PersonnelDepartment');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:PersonnelDepartment');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:PersonnelDepartment');
    }
}
