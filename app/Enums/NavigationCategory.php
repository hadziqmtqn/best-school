<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum NavigationCategory: string implements HasLabel
{
    use EnumOption;

    case SCHOOL_IDENTITY = 'school_identity';
    case PROGRAM = 'program';
    case GALLERY = 'galery';
    case EVENT = 'event';
    case TEACHER = 'teacher';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::SCHOOL_IDENTITY => 'Identitas Sekolah',
            self::PROGRAM => 'Program Sekolah',
            self::GALLERY => 'Galeri',
            self::EVENT => 'Acara',
            self::TEACHER => 'Pendidik',
        };
    }
}
