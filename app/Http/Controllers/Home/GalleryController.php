<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Event\GalleryRepository;
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
        $galleries = $this->galleryRepository->index();

        return \view('home.gallery.photo', compact('title', 'galleries'));
    }

    public function video(): View
    {
        $title = 'Video';

        return \view('home.gallery.video', compact('title'));
    }
}
