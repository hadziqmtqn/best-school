<?php

namespace App\Policies;

use App\Models\Rombel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RombelPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Rombel');
    }

    public function view(User $user, Rombel $rombel): bool
    {
        return $user->can('View:Rombel', $rombel);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Rombel');
    }

    public function update(User $user, Rombel $rombel): bool
    {
        return $user->can('Update:Rombel', $rombel);
    }

    public function delete(User $user, Rombel $rombel): bool
    {
        return $user->can('Delete:Rombel', $rombel);
    }

    public function restore(User $user, Rombel $rombel): bool
    {
        return $user->can('Restore:Rombel', $rombel);
    }

    public function forceDelete(User $user, Rombel $rombel): bool
    {
        return $user->can('ForceDelete:Rombel', $rombel);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Rombel');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Rombel');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Rombel');
    }
}
