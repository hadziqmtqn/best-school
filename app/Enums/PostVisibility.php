<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum PostVisibility: string implements HasLabel, HasColor
{
    use EnumOption;

    case PUBLIC = 'public';
    case PRIVATE = 'private';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::PUBLIC => 'Public',
            self::PRIVATE => 'Private'
        };
    }

    public function getColor(): string|array|null
    {
        // TODO: Implement getColor() method.
        return match ($this) {
            self::PUBLIC => 'info',
            self::PRIVATE => 'warning'
        };
    }
}
