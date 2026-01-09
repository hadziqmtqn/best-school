<?php

namespace App\Policies;

use App\Models\Homebase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomebasePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAnyHomebase');
    }

    public function view(User $user, Homebase $homebase): bool
    {
        return $user->can('ViewHomebase', $homebase);
    }

    public function create(User $user): bool
    {
        return $user->can('CreateHomebase');
    }

    public function update(User $user, Homebase $homebase): bool
    {
        return $user->can('UpdateHomebase', $homebase);
    }

    public function delete(User $user, Homebase $homebase): bool
    {
        return $user->can('DeleteHomebase', $homebase);
    }

    public function restore(User $user, Homebase $homebase): bool
    {
        return $user->can('RestoreHomebase', $homebase);
    }

    public function forceDelete(User $user, Homebase $homebase): bool
    {
        return $user->can('ForceDeleteHomebase', $homebase);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAnyHomebase');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAnyHomebase');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAnyHomebase');
    }
}
