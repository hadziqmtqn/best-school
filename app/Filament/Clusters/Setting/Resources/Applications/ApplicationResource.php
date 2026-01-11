<?php

namespace App\Filament\Clusters\Setting\Resources\Applications;

use App\Filament\Clusters\Setting\Resources\Applications\Pages\AppAssets;
use App\Filament\Clusters\Setting\Resources\Applications\Pages\EditApplication;
use App\Filament\Clusters\Setting\Resources\Applications\Pages\ListApplications;
use App\Filament\Clusters\Setting\Resources\Applications\Pages\SocialMedias;
use App\Filament\Clusters\Setting\Resources\Applications\Schemas\ApplicationForm;
use App\Filament\Clusters\Setting\Resources\Applications\Tables\ApplicationsTable;
use App\Filament\Clusters\Setting\SettingCluster;
use App\Models\Application;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $cluster = SettingCluster::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'Aplikasi';

    protected static ?string $label = 'Aplikasi';

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;

    public static function getNavigationUrl(): string
    {
        return self::getUrl('edit', ['record' => Application::first()]);
    }

    public static function form(Schema $schema): Schema
    {
        return ApplicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApplicationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApplications::route('/'),
            'edit' => EditApplication::route('/{record}'),
            'assets' => AppAssets::route('/{record}/assets'),
            'social-media' => SocialMedias::route('/{record}/social-media'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            EditApplication::class,
            SocialMedias::class,
            AppAssets::class,
        ]);
    }
}
