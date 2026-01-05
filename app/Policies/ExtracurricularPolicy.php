<?php

namespace App\Policies;

use App\Models\Extracurricular;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExtracurricularPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Extracurricular');
    }

    public function view(User $user, Extracurricular $extracurricular): bool
    {
        return $user->can('View:Extracurricular', $extracurricular);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Extracurricular');
    }

    public function update(User $user, Extracurricular $extracurricular): bool
    {
        return $user->can('Update:Extracurricular', $extracurricular);
    }

    public function delete(User $user, Extracurricular $extracurricular): bool
    {
        return $user->can('Delete:Extracurricular', $extracurricular);
    }

    public function restore(User $user, Extracurricular $extracurricular): bool
    {
        return $user->can('Restore:Extracurricular', $extracurricular);
    }

    public function forceDelete(User $user, Extracurricular $extracurricular): bool
    {
        return $user->can('ForceDelete:Extracurricular', $extracurricular);
    }
}
