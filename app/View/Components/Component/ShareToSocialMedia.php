<?php

namespace App\View\Components\Component;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShareToSocialMedia extends Component
{
    public ?string $url = null;

    /**
     * @param string|null $url
     */
    public function __construct(?string $url)
    {
        $this->url = $url;
    }

    public function render(): View
    {
        return view('components.component.share-to-social-media');
    }
}
