<?php

namespace App\Filament\Clusters\Setting\Resources\Applications\Pages;

use App\Filament\Clusters\Setting\Resources\Applications\ApplicationResource;
use App\Filament\Clusters\Setting\Resources\Applications\Schemas\MoreInfoForm;
use BackedEnum;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use ToneGabes\Filament\Icons\Enums\Phosphor;

class EditMoreInfo extends EditRecord
{
    protected static string $resource = ApplicationResource::class;

    protected static string | BackedEnum | null $navigationIcon = Phosphor::InfoDuotone;

    protected static ?string $navigationLabel = 'Lainnya';

    protected static ?string $title = 'Pengaturan Lainnya';

    public function form(Schema $schema): Schema
    {
        return MoreInfoForm::form($schema);
    }
}
