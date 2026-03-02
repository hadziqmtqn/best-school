<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\PostRequest;
use App\Models\Post;
use App\Repositories\Posts\PostRepository;
use Illuminate\View\View;

class PostController extends Controller
{
    protected PostRepository $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(PostRequest $request): View
    {
        $title = 'Berita';
        $posts = $this->postRepository->index(
            request: $request->all(),
            isPaginate: true
        );

        return \view('home.post.index', compact('title', 'posts'));
    }

    public function show(Post $post): View
    {
        $title = $post->title;

        return \view('home.post.show', compact('title', 'post'));
    }

    public function page(Post $post): View
    {
        $title = $post->title;

        return \view('home.post.page', compact('title', 'post'));
    }
}
