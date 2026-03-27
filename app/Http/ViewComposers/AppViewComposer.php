<?php

namespace App\Http\ViewComposers;

use App\Repositories\Posts\PostRepository;
use App\Repositories\Settings\ApplicationRepository;
use Illuminate\View\View;

class AppViewComposer
{
    protected ApplicationRepository $applicationRepository;
    protected PostRepository $postRepository;

    /**
     * @param ApplicationRepository $applicationRepository
     * @param PostRepository $postRepository
     */
    public function __construct(ApplicationRepository $applicationRepository, PostRepository $postRepository)
    {
        $this->applicationRepository = $applicationRepository;
        $this->postRepository = $postRepository;
    }

    public function compose(View $view): void
    {
        $view->with('application', $this->applicationRepository->index());
        $view->with('relatedPosts', $this->postRepository->index(limit: 5));
    }
}
