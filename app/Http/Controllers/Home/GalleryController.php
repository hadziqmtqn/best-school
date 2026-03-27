<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Event\GalleryRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    protected GalleryRepository $galleryRepository;

    /**
     * @param GalleryRepository $galleryRepository
     */
    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function photo(): View
    {
        $title = 'Foto';
        $galleries = $this->galleryRepository->photo();

        return \view('home.gallery.photo', compact('title', 'galleries'));
    }

    public function video(Request $request): View
    {
        $title = 'Video';
        $videos = $this->galleryRepository->video($request);

        return \view('home.gallery.video', compact('title', 'videos'));
    }
}
