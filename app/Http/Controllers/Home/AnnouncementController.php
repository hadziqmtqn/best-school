<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Event\AnnouncementRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    protected AnnouncementRepository $announcementRepository;

    /**
     * @param AnnouncementRepository $announcementRepository
     */
    public function __construct(AnnouncementRepository $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
    }

    public function index(Request $request): View
    {
        $title = 'Pengumuman';
        $announcements = $this->announcementRepository->index($request);

        return \view('home.announcement.index', compact('title', 'announcements'));
    }
}
