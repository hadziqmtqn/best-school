<?php

namespace App\Policies;

use App\Models\SchoolStatsOverview;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolStatsOverviewPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:SchoolStatsOverview');
    }

    public function view(User $user, SchoolStatsOverview $schoolStatsOverview): bool
    {
        return $user->can('View:SchoolStatsOverview', $schoolStatsOverview);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:SchoolStatsOverview');
    }

    public function update(User $user, SchoolStatsOverview $schoolStatsOverview): bool
    {
        return $user->can('Update:SchoolStatsOverview', $schoolStatsOverview);
    }

    public function delete(User $user, SchoolStatsOverview $schoolStatsOverview): bool
    {
        return $user->can('Delete:SchoolStatsOverview', $schoolStatsOverview);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:SchoolStatsOverview');
    }

    public function restore(User $user, SchoolStatsOverview $schoolStatsOverview): bool
    {
        return $user->can('Restore:SchoolStatsOverview', $schoolStatsOverview);
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:SchoolStatsOverview');
    }

    public function forceDelete(User $user, SchoolStatsOverview $schoolStatsOverview): bool
    {
        return $user->can('ForceDelete:SchoolStatsOverview', $schoolStatsOverview);
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:SchoolStatsOverview');
    }
}
