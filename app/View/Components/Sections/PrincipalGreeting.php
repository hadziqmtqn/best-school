<?php

namespace App\View\Components\Sections;

use App\Repositories\Posts\LeadershipGreetingRepository;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrincipalGreeting extends Component
{
    protected LeadershipGreetingRepository $leadershipGreetingRepository;

    /**
     * @param LeadershipGreetingRepository $leadershipGreetingRepository
     */
    public function __construct(LeadershipGreetingRepository $leadershipGreetingRepository)
    {
        $this->leadershipGreetingRepository = $leadershipGreetingRepository;
    }

    public function render(): View
    {
        return view('components.sections.principal-greeting', [
            'leadershipGreeting' => $this->leadershipGreetingRepository->index()
        ]);
    }
}
