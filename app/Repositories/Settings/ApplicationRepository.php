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
            'title' => null,
            'shortName' => $application?->short_name,
            'description' => $application?->description,
            'logo' => $application?->logo,
            'phoneNumber' => $application?->phone_number,
            'email' => $application?->email,
            'headerImg' => null,
            'breadcrumbImg' => $application?->breadcrumb,
            'ctaImg' => $application?->cta,
            'themeColors' => ThemeColor::getCombination($application?->theme_color)
        ];
    }
}
