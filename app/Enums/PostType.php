<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum PostType: string implements HasLabel, HasColor
{
    use EnumOption;

    case POST = 'post';
    case PAGE = 'page';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::POST => 'Post',
            self::PAGE => 'Laman'
        };
    }

    public function getColor(): string|array|null
    {
        // TODO: Implement getColor() method.
        return match ($this) {
            self::POST => 'success',
            self::PAGE => 'danger'
        };
    }
}
