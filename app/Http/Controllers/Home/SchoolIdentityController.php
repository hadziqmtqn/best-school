<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostRepository;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Illuminate\View\View;

class SchoolIdentityController extends Controller
{
    protected InstitutionRepository $institutionRepository;
    protected PostRepository $postRepository;

    /**
     * @param InstitutionRepository $institutionRepository
     * @param PostRepository $postRepository
     */
    public function __construct(InstitutionRepository $institutionRepository, PostRepository $postRepository)
    {
        $this->institutionRepository = $institutionRepository;
        $this->postRepository = $postRepository;
    }

    public function index(): View
    {
        $title = 'Identitas Sekolah';
        $institutions = $this->institutionRepository->identity();
        $relatedPosts = $this->postRepository->index(
            limit: 5
        );

        return \view('home.school-identity.index', compact('title', 'institutions', 'relatedPosts'));
    }
}
