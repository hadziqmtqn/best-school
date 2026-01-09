<?php

namespace App\Policies;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Gallery');
    }

    public function view(User $user, Gallery $gallery): bool
    {
        return $user->can('View:Gallery', $gallery);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Gallery');
    }

    public function update(User $user, Gallery $gallery): bool
    {
        return $user->can('Update:Gallery', $gallery);
    }

    public function delete(User $user, Gallery $gallery): bool
    {
        return $user->can('Delete:Gallery', $gallery);
    }

    public function restore(User $user, Gallery $gallery): bool
    {
        return $user->can('Restore:Gallery', $gallery);
    }

    public function forceDelete(User $user, Gallery $gallery): bool
    {
        return $user->can('ForceDelete:Gallery', $gallery);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Gallery');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Gallery');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Gallery');
    }
}
