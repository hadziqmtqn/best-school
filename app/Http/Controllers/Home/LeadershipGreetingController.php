<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Posts\LeadershipGreetingRepository;

class LeadershipGreetingController extends Controller
{
    protected LeadershipGreetingRepository $leadershipGreetingRepository;

    /**
     * @param LeadershipGreetingRepository $leadershipGreetingRepository
     */
    public function __construct(LeadershipGreetingRepository $leadershipGreetingRepository)
    {
        $this->leadershipGreetingRepository = $leadershipGreetingRepository;
    }

    public function index()
    {
        $title = 'Sambutan Pimpinan';
        $leadershipGreeting = $this->leadershipGreetingRepository->index();

        return view('home.leadership-greeting.index', compact('title', 'leadershipGreeting'));
    }
}
