<?php

namespace App\Repositories\References;

class AchievementLevel
{
    public static function option(): array
    {
        return collect([
            'Internasional',
            'Nasional',
            'Provinsi',
            'Kabupaten',
            'Sekolah'
        ])
            ->mapWithKeys(fn($item) => [$item => $item])
            ->toArray();
    }
}
