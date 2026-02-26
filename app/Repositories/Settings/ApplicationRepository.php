<?php

namespace App\Repositories\Settings;

use App\Models\Application;
use App\Utilities\ThemeColor;

class ApplicationRepository
{
    public function index(): array
    {
        $application = Application::first();

        return [
            'name' => $application?->name,
            'shortName' => $application?->short_name,
            'motto' => $application?->motto,
            'description' => $application?->description,
            'logo' => $application?->logo,
            'phoneNumber' => $application?->phone_number,
            'email' => $application?->email,
            'headerImg' => null,
            'breadcrumbImg' => $application?->breadcrumb,
            'bannerImg' => $application?->banner_image,
            'themeColors' => ThemeColor::getCombination($application?->theme_color)
        ];
    }
}
