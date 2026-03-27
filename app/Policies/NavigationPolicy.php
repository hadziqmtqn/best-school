<?php

namespace App\Policies;

use App\Models\Navigation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NavigationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Navigation');
    }

    public function view(User $user, Navigation $navigation): bool
    {
        return $user->can('View:Navigation', $navigation);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Navigation');
    }

    public function update(User $user, Navigation $navigation): bool
    {
        return $user->can('Update:Navigation', $navigation);
    }

    public function delete(User $user, Navigation $navigation): bool
    {
        return $user->can('Delete:Navigation', $navigation);
    }

    public function restore(User $user, Navigation $navigation): bool
    {
        return $user->can('Restore:Navigation', $navigation);
    }

    public function forceDelete(User $user, Navigation $navigation): bool
    {
        return $user->can('ForceDelete:Navigation', $navigation);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Navigation');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Navigation');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Navigation');
    }
}
