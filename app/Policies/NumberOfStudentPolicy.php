<?php

namespace App\Policies;

use App\Models\NumberOfStudent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NumberOfStudentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:NumberOfStudent');
    }

    public function view(User $user, NumberOfStudent $numberOfStudent): bool
    {
        return $user->can('View:NumberOfStudent', $numberOfStudent);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:NumberOfStudent');
    }

    public function update(User $user, NumberOfStudent $numberOfStudent): bool
    {
        return $user->can('Update:NumberOfStudent', $numberOfStudent);
    }

    public function delete(User $user, NumberOfStudent $numberOfStudent): bool
    {
        return $user->can('Delete:NumberOfStudent', $numberOfStudent);
    }

    public function restore(User $user, NumberOfStudent $numberOfStudent): bool
    {
        return $user->can('Restore:NumberOfStudent', $numberOfStudent);
    }

    public function forceDelete(User $user, NumberOfStudent $numberOfStudent): bool
    {
        return $user->can('ForceDelete:NumberOfStudent', $numberOfStudent);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:NumberOfStudent');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:NumberOfStudent');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:NumberOfStudent');
    }
}
