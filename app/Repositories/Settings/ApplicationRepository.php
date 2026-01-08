<?php

namespace App\Repositories\Settings;

use App\Models\Application;

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
            'whatsappNumber' => null,
            'email' => null,
            'headerImg' => null
        ];
    }
}