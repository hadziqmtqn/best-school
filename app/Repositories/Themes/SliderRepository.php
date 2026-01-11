<?php

namespace App\Repositories\Themes;

use App\Models\Gallery;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class SliderRepository
{
    /**
     * @throws FileNotFoundException
     */
    public function assets(): array
    {
        $sliders = Gallery::query()
            ->whereNotNull('application_id')
            ->get();


        if ($sliders->isEmpty()) {
            return json_decode(File::get(database_path('import/themes/slider-assets.json')), true);
        }else {
            $assets = [];

            foreach ($sliders as $slider) {
                $assets[] = [
                    'title' => $slider->name,
                    'description' => $slider->description,
                    'asset' => $slider->hasMedia('slider') ? $slider->getFirstMediaUrl('slider') : null,
                    'action_name' => $slider->action_name,
                    'action_url' => $slider->action_url
                ];
            }

            return $assets;
        }
    }
}
