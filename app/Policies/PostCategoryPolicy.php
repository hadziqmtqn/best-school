<?php

namespace App\Policies;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:PostCategory');
    }

    public function view(User $user, PostCategory $postCategory): bool
    {
        return $user->can('View:PostCategory', $postCategory);
    }

    public function create(User $user): bool
    {
        return $user->can('Create:PostCategory');
    }

    public function update(User $user, PostCategory $postCategory): bool
    {
        return $user->can('Update:PostCategory', $postCategory);
    }

    public function delete(User $user, PostCategory $postCategory): bool
    {
        return $user->can('Delete:PostCategory');
    }

    public function restore(User $user, PostCategory $postCategory): bool
    {
        return $user->can('Restore:PostCategory', $postCategory);
    }

    public function forceDelete(User $user, PostCategory $postCategory): bool
    {
        return $user->can('ForceDelete:PostCategory', $postCategory);
    }
}
