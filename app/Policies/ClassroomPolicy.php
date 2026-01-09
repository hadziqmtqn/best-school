<?php

namespace App\Policies;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Classroom');
    }

    public function view(User $user, Classroom $classroom): bool
    {
        return $user->can('View:Classroom', $classroom);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Classroom');
    }

    public function update(User $user, Classroom $classroom): bool
    {
        return $user->can('Update:Classroom', $classroom);
    }

    public function delete(User $user, Classroom $classroom): bool
    {
        return $user->can('Delete:Classroom', $classroom);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Classroom');
    }

    public function restore(User $user, Classroom $classroom): bool
    {
        return $user->can('Restore:Classroom', $classroom);
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Classroom');
    }

    public function forceDelete(User $user, Classroom $classroom): bool
    {
        return $user->can('ForceDelete:Classroom', $classroom);
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Classroom');
    }
}
