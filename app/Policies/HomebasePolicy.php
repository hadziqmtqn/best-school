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
        return $user->can('ViewAny:Homebase');
    }

    public function view(User $user, Homebase $homebase): bool
    {
        return $user->can('View:Homebase', $homebase);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Homebase');
    }

    public function update(User $user, Homebase $homebase): bool
    {
        return $user->can('Update:Homebase', $homebase);
    }

    public function delete(User $user, Homebase $homebase): bool
    {
        return $user->can('Delete:Homebase', $homebase);
    }

    public function restore(User $user, Homebase $homebase): bool
    {
        return $user->can('Restore:Homebase', $homebase);
    }

    public function forceDelete(User $user, Homebase $homebase): bool
    {
        return $user->can('ForceDelete:Homebase', $homebase);
    }
}
