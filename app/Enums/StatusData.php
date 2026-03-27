<?php

namespace App\Enums;

use App\Traits\EnumOption;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum StatusData: string implements HasLabel, HasColor
{
    use EnumOption;

    case PUBLISHED = 'published';
    case DRAFT = 'draft';
    case PENDING_REVIEW = 'pending_review';

    public function getLabel(): string|Htmlable|null
    {
        // TODO: Implement getLabel() method.
        return match ($this) {
            self::PUBLISHED => 'Dipublikasikan',
            self::DRAFT => 'Draft',
            self::PENDING_REVIEW => 'Sedang Ditinjau'
        };
    }

    public function getColor(): string|array|null
    {
        // TODO: Implement getColor() method.
        return match ($this) {
            self::PUBLISHED => 'success',
            self::DRAFT => 'warning',
            self::PENDING_REVIEW => 'danger'
        };
    }
}
