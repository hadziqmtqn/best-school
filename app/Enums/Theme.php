<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Theme: string implements HasLabel
{
    use EnumOption;

    case THEME_1 = 'theme_1';
    case THEME_2 = 'theme_2';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::THEME_1 => 'Theme 1',
            self::THEME_2 => 'Theme 2',
        };
    }
}
