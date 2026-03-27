<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum AchievementLevel: string implements HasLabel, HasColor
{
    use EnumOption;

    case INTERNASIONAL = 'Internasional';
    case NASIONAL = 'Nasional';
    case PROVINSI = 'Provinsi';
    case KABUPATEN = 'Kabupaten';
    case SEKOLAH = 'Sekolah';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::INTERNASIONAL => self::INTERNASIONAL->value,
            self::NASIONAL => self::NASIONAL->value,
            self::PROVINSI => self::PROVINSI->value,
            self::KABUPATEN => self::KABUPATEN->value,
            self::SEKOLAH => self::SEKOLAH->value,
        };
    }

    public function getColor(): string|array|null
    {
        // TODO: Implement getColor() method.
        return match ($this) {
            self::INTERNASIONAL => 'primary',
            self::NASIONAL => 'success',
            self::PROVINSI => 'info',
            self::KABUPATEN => 'warning',
            self::SEKOLAH => 'secondary',
        };
    }
}
