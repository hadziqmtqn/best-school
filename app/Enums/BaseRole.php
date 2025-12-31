<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum BaseRole: string implements HasLabel
{
    use EnumOption;

    case SUPER_ADMIN = 'super_admin';
    case CONTRIBUTOR = 'contributor';
    case WRITER = 'writer';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::CONTRIBUTOR => 'Kontributor',
            self::WRITER => 'Penulis'
        };
    }
}
