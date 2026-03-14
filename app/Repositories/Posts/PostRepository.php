<?php

namespace App\Repositories\Posts;

use App\Enums\PostType;
use App\Enums\StatusData;
use App\Models\Post;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use LaravelIdea\Helper\App\Models\_IH_Post_QB;

class PostRepository
{
    public function index(
        ?array $request = [],
        ?bool $inRandomOrder = false,
        ?bool $isPaginate = false,
        ?int $limit = 3
    ): Collection|LengthAwarePaginator|_IH_Post_QB|AbstractPaginator {
        $post = Post::query()
            ->with([
                'postCategory:id,name',
                'institution:id,name',
                'user:id,name'
            ])
            ->filterByStatus(StatusData::PUBLISHED->value)
            ->filterData($request)
            ->filterByType(PostType::POST->value);

        if ($inRandomOrder) {
            $post->inRandomOrder();
        }else {
            $post->latest();
        }

        if ($isPaginate) {
            return $post->paginate(12)
                ->withQueryString();
        }else {
            return $post->limit($limit)
                ->get();
        }
    }
}
