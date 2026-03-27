<?php

namespace App\Policies;

use App\Models\EducationalHistory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationalHistoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAnyEducationalHistory');
    }

    public function view(User $user, EducationalHistory $educationalHistory): bool
    {
        return $user->can('ViewEducationalHistory', $educationalHistory);
    }

    public function create(User $user): bool
    {
        return $user->can('CreateEducationalHistory');
    }

    public function update(User $user, EducationalHistory $educationalHistory): bool
    {
        return $user->can('UpdateEducationalHistory', $educationalHistory);
    }

    public function delete(User $user, EducationalHistory $educationalHistory): bool
    {
        return $user->can('DeleteEducationalHistory', $educationalHistory);
    }

    public function restore(User $user, EducationalHistory $educationalHistory): bool
    {
        return $user->can('RestoreEducationalHistory', $educationalHistory);
    }

    public function forceDelete(User $user, EducationalHistory $educationalHistory): bool
    {
        return $user->can('ForceDeleteEducationalHistory', $educationalHistory);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAnyEducationalHistory');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAnyEducationalHistory');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAnyEducationalHistory');
    }
}
