<?php

namespace App\Policies;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgendaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Agenda');
    }

    public function view(User $user, Agenda $agenda): bool
    {
        return $user->can('View:Agenda', $agenda);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Agenda');
    }

    public function update(User $user, Agenda $agenda): bool
    {
        return $user->can('Update:Agenda', $agenda);
    }

    public function delete(User $user, Agenda $agenda): bool
    {
        return $user->can('Delete:Agenda', $agenda);
    }

    public function restore(User $user, Agenda $agenda): bool
    {
        return $user->can('Restore:Agenda', $agenda);
    }

    public function forceDelete(User $user, Agenda $agenda): bool
    {
        return $user->can('ForceDelete:Agenda', $agenda);
    }
}
