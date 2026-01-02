<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\Features;

use Filament\Schemas\Components\Section;

class EducationalHistoryData
{
    public static function schema()
    {
        return Section::make('Riwayat Pendidikan')
            ->description('Riwayat pendidikan formal pegawai yang mendukung kualifikasi jabatan.')
            ->columnSpanFull()
            ->aside();
    }
}