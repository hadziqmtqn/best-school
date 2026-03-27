<?php

namespace App\Policies;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Announcement');
    }

    public function view(User $user, Announcement $announcement): bool
    {
        return $user->can('View:Announcement', $announcement);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Announcement');
    }

    public function update(User $user, Announcement $announcement): bool
    {
        return $user->can('Update:Announcement', $announcement);
    }

    public function delete(User $user, Announcement $announcement): bool
    {
        return $user->can('Delete:Announcement', $announcement);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Announcement');
    }

    public function restore(User $user, Announcement $announcement): bool
    {
        return $user->can('Restore:Announcement', $announcement);
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Announcement');
    }

    public function forceDelete(User $user, Announcement $announcement): bool
    {
        return $user->can('ForceDelete:Announcement', $announcement);
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Announcement');
    }
}
