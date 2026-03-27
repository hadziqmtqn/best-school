<?php

namespace App\View\Components\Sections;

use App\Repositories\Posts\PostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestNews extends Component
{
    protected PostRepository $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function render(): View
    {
        $posts = $this->postRepository->index();

        return view('components.sections.latest-news', compact('posts'));
    }
}
