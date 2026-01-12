<?php

namespace App\Policies;

use App\Helpers\UserRole;
use App\Models\Achievement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchievementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Achievement');
    }

    public function view(User $user, Achievement $achievement): bool
    {
        return $user->can('View:Achievement', $achievement);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Achievement');
    }

    public function update(User $user, Achievement $achievement): bool
    {
        $user->loadMissing('homebaseActive');
        $canUpdate = $user->can('Update:Achievement');

        if (!UserRole::isSuperAdmin()) {
            return $canUpdate && $user->homebaseActive?->institution_id === $achievement->institution_id;
        }

        return $canUpdate;
    }

    public function delete(User $user, Achievement $achievement): bool
    {
        $user->loadMissing('homebaseActive');
        $canDelete = $user->can('Delete:Achievement');

        if (!UserRole::isSuperAdmin()) {
            return $canDelete && $user->homebaseActive?->institution_id === $achievement->institution_id;
        }

        return $canDelete;
    }

    public function restore(User $user, Achievement $achievement): bool
    {
        return $user->can('Restore:Achievement', $achievement);
    }

    public function forceDelete(User $user, Achievement $achievement): bool
    {
        return $user->can('ForceDelete:Achievement', $achievement);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Achievement');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Achievement');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Achievement');
    }
}
