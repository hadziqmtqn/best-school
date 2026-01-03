<?php

namespace App\Repositories;

use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Builder;

class PostCategoryRepository
{
    public static function options($activeOnly = true): array
    {
        return PostCategory::query()
            ->when($activeOnly, fn(Builder $query) => $query->where('is_active', true))
            ->get()
            ->mapWithKeys(fn(PostCategory $postCategory) => [$postCategory->id => $postCategory->name])
            ->toArray();
    }
}
