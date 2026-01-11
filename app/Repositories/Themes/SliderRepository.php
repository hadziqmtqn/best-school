<?php

namespace App\Repositories\Themes;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class SliderRepository
{
    /**
     * @throws FileNotFoundException
     */
    public function assets(): array
    {
        return json_decode(File::get(database_path('import/themes/slider-assets.json')), true);
    }
}
