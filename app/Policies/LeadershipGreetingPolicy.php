<?php

namespace App\Policies;

use App\Models\LeadershipGreeting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeadershipGreetingPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:LeadershipGreeting');
    }

    public function view(User $user, LeadershipGreeting $leadershipGreeting): bool
    {
        return $user->can('View:LeadershipGreeting', $leadershipGreeting);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:LeadershipGreeting') && !LeadershipGreeting::exists();
    }

    public function update(User $user, LeadershipGreeting $leadershipGreeting): bool
    {
        return $user->can('Update:LeadershipGreeting', $leadershipGreeting);
    }

    public function delete(User $user, LeadershipGreeting $leadershipGreeting): bool
    {
        return $user->can('Delete:LeadershipGreeting', $leadershipGreeting);
    }
}
