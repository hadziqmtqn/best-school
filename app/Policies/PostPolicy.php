<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Post');
    }

    public function view(User $user, Post $post): bool
    {
        return $user->can('View:Post', $post);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Post');
    }

    public function update(User $user, Post $post): bool
    {
        return $user->can('Update:Post', $post);
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->can('Delete:Post') && $user->id === $post->user_id;
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Post');
    }

    public function restore(User $user, Post $post): bool
    {
        return $user->can('Restore:Post') && $user->id === $post->user_id;
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Post');
    }

    public function forceDelete(User $user, Post $post): bool
    {
        return $user->can('ForceDelete:Post') && $user->id === $post->user_id;
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Post');
    }
}
