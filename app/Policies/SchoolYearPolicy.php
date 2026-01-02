<?php

namespace App\Policies;

use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolYearPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:SchoolYear');
    }

    public function view(User $user, SchoolYear $schoolYear): bool
    {
        return $user->can('View:SchoolYear', $schoolYear);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:SchoolYear');
    }

    public function update(User $user, SchoolYear $schoolYear): bool
    {
        return $user->can('Update:SchoolYear', $schoolYear);
    }

    public function delete(User $user, SchoolYear $schoolYear): bool
    {
        $schoolYear->loadCount('employeePositions');

        return $user->can('Delete:SchoolYear') &&
            $schoolYear->employee_positions_count === 0;
    }
}
