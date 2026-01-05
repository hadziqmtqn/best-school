<?php

namespace App\Policies;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacilityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Facility');
    }

    public function view(User $user, Facility $facility): bool
    {
        return $user->can('View:Facility', $facility);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Facility');
    }

    public function update(User $user, Facility $facility): bool
    {
        return $user->can('Update:Facility', $facility);
    }

    public function delete(User $user, Facility $facility): bool
    {
        return $user->can('Delete:Facility', $facility);
    }

    public function restore(User $user, Facility $facility): bool
    {
        return $user->can('Restore:Facility', $facility);
    }

    public function forceDelete(User $user, Facility $facility): bool
    {
        return $user->can('ForceDelete:Facility', $facility);
    }
}
