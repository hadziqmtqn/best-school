<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum NavigationCategory: string implements HasLabel
{
    use EnumOption;

    case SCHOOL_IDENTITY = 'school_identity';
    case EXTRACURICULAR = 'extracuricular';
    case ACHIEVEMeENT = 'achievement';
    case PHOTO = 'photo';
    case VIDEO = 'video';
    case AGENDA = 'agenda';
    case ANNOUNCEMENT = 'announcement';
    case TEACHER = 'teacher';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::SCHOOL_IDENTITY => 'Identitas Sekolah',
            self::EXTRACURICULAR => 'Ekstrakurikuler',
            self::ACHIEVEMeENT => 'Prestasi',
            self::PHOTO => 'Foto',
            self::VIDEO => 'Video',
            self::AGENDA => 'Agenda',
            self::ANNOUNCEMENT => 'Pengumuman',
            self::TEACHER => 'Pendidik',
        };
    }
}
