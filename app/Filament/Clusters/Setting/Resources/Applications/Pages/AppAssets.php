<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Pages;

use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
use App\Filament\Clusters\Setting\Resources\Applications\Schemas\AppAssetsForm;
use BackedEnum;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class AppAssets extends EditRecord
{
    protected static string $resource = ApplicationResource::class;

    protected static ?string $navigationLabel = 'Asset';

    protected static ?string $title = 'Asset';

    protected static string | BackedEnum | null $navigationIcon = Phosphor::Image;

    public function form(Schema $schema): Schema
    {
        return AppAssetsForm::form($schema);
    }
}
