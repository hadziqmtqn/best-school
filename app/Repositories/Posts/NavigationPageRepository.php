<?php

namespace App\Repositories\Posts;

use App\Enums\PostType;
use App\Enums\StatusData;
use App\Models\Post;

class NavigationPageRepository
{
    public static function options(): array
    {
        return Post::query()
            ->where([
                'type' => PostType::PAGE->value,
                'status' => StatusData::PUBLISHED->value
            ])
            ->get()
            ->mapWithKeys(function (Post $post) {
                return [$post->id => $post->title];
            })
            ->toArray();
    }
}