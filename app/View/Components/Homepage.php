<?php

namespace App\View\Components;

use App\Enums\Theme;
use App\Models\Application;
use App\Repositories\Themes\SliderRepository;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Homepage extends Component
{
    protected SliderRepository $sliderRepository;

    /**
     * @param SliderRepository $sliderRepository
     */
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * @throws FileNotFoundException
     */
    public function render(): View
    {
        $theme = Theme::tryFrom(Application::first()?->theme)?->value ?? 'theme_1';

        $view = "components.home.$theme.index";

        if (! view()->exists($view)) {
            $view = 'components.home.theme_1.index';
        }

        $sliders = $this->sliderRepository->assets();

        return view($view, compact('sliders'));
    }
}
