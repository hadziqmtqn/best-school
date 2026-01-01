<?php

namespace App\Policies;

use App\Models\EducationalLevel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationalLevelPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:EducationalLevel');
    }

    public function view(User $user, EducationalLevel $educationalLevel): bool
    {
        return $user->can('View:EducationalLevel', $educationalLevel);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:EducationalLevel');
    }

    public function update(User $user, EducationalLevel $educationalLevel): bool
    {
        return $user->can('Update:EducationalLevel', $educationalLevel);
    }

    public function delete(User $user, EducationalLevel $educationalLevel): bool
    {
        $educationalLevel->loadCount('institutions');

        return $user->can('Delete:EducationalLevel') && $educationalLevel->institutions_count === 0;
    }
}
