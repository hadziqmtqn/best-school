<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Pages;

use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
use App\Filament\Clusters\Setting\Resources\Applications\Schemas\SocialMediaForm;
use BackedEnum;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class SocialMedias extends EditRecord
{
    protected static string $resource = ApplicationResource::class;

    protected static ?string $navigationLabel = 'Sosial Media';

    protected static string | BackedEnum | null $navigationIcon = Phosphor::FacebookLogo;

    public function form(Schema $schema): Schema
    {
        return SocialMediaForm::form($schema);
    }
}
