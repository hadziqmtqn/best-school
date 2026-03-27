<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Gender: string implements HasLabel
{
    use EnumOption;

    case MALE = 'male';
    case FAMALE = 'famale';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::MALE => 'Laki-laki',
            self::FAMALE => 'Perempuan'
        };
    }
}
