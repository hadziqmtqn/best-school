<?php

namespace App\Policies;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstitutionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Institution');
    }

    public function view(User $user, Institution $institution): bool
    {
        return $user->can('View:Institution', $institution);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Institution');
    }

    public function update(User $user, Institution $institution): bool
    {
        return $user->can('Update:Institution', $institution);
    }

    public function delete(User $user, Institution $institution): bool
    {
        $institution->loadCount('homebases')
            ->loadCount('employeePositions');

        return $user->can('Delete:Institution') &&
            $institution->homebases_count === 0 &&
            $institution->employee_positions_count === 0;
    }

    public function restore(User $user, Institution $institution): bool
    {
        return $user->can('Restore:Institution', $institution);
    }

    public function forceDelete(User $user, Institution $institution): bool
    {
        return $user->can('ForceDelete:Institution', $institution);
    }
}
