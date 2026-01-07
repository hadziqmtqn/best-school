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

    public function restore(User $user, Announcement $announcement): bool
    {
        return $user->can('Restore:Announcement', $announcement);
    }

    public function forceDelete(User $user, Announcement $announcement): bool
    {
        return $user->can('ForceDelete:Announcement', $announcement);
    }
}
