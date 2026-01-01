<?php

namespace App\Filament\GlobalSchemas;

use App\Services\Reference\IndonesiaLocationService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;

class IdnLocationForm
{
    public static function province(?string $customField = null, ?bool $required = false): Select
    {
        return Select::make($customField ?? 'province')
            ->label('Provinsi')
            ->searchable()
            ->getSearchResultsUsing(fn (string $search) => IndonesiaLocationService::search('https://idn-location.bkn.my.id/api/v1/provinces', $search))
            ->required($required)
            ->getOptionLabelUsing(fn ($value) => $value)
            ->dehydrated()
            ->dehydrateStateUsing(fn($state) => $state === '' ? null : $state)
            ->reactive()
            ->afterStateUpdated(function ($state, callable $set) {
                $set('city', null);
                $set('district', null);
                $set('village', null);
            });
    }

    public static function city(?string $customField = null, ?bool $required = false): Select
    {
        return Select::make($customField ?? 'city')
            ->label('Kota/Kabupaten')
            ->searchable()
            ->getSearchResultsUsing(function (string $search, Get $get) {
                $province = $get('province');

                if (! $province) {
                    return [];
                }

                return IndonesiaLocationService::search(
                    'https://idn-location.bkn.my.id/api/v1/cities',
                    $search,
                    ['province' => $province]
                );
            })
            ->required($required)
            ->getOptionLabelUsing(fn ($value) => $value)
            ->dehydrated()
            ->dehydrateStateUsing(fn($state) => $state === '' ? null : $state)
            ->reactive()
            ->afterStateUpdated(function ($state, callable $set) {
                $set('district', null);
                $set('village', null);
            });
    }

    public static function district(?string $customField = null, ?bool $required = false): Select
    {
        return Select::make($customField ?? 'district')
            ->label('Kecamatan')
            ->searchable()
            ->getSearchResultsUsing(function (string $search, Get $get) {
                $city = $get('city');

                if (! $city) {
                    return [];
                }

                return IndonesiaLocationService::search(
                    'https://idn-location.bkn.my.id/api/v1/districts',
                    $search,
                    ['city' => $city]
                );
            })
            ->required($required)
            ->getOptionLabelUsing(fn ($value) => $value)
            ->dehydrated()
            ->dehydrateStateUsing(fn($state) => $state === '' ? null : $state)
            ->reactive()
            ->afterStateUpdated(function ($state, callable $set) {
                $set('village', null);
            });
    }

    public static function village(?string $customField = null, ?bool $required = false): Select
    {
        return Select::make($customField ?? 'village')
            ->label('Desa/Kelurahan')
            ->searchable()
            ->getSearchResultsUsing(function (string $search, Get $get) {
                $district = $get('district');

                if (! $district) {
                    return [];
                }

                return IndonesiaLocationService::search(
                    'https://idn-location.bkn.my.id/api/v1/villages',
                    $search,
                    ['district' => $district]
                );
            })
            ->required($required)
            ->getOptionLabelUsing(fn ($value) => $value)
            ->dehydrated()
            ->dehydrateStateUsing(fn($state) => $state === '' ? null : $state)
            ->reactive();
    }

    public static function street(?string $customField = null, ?bool $required = false): TextInput
    {
        return TextInput::make($customField ?? 'street')
            ->label('Jalan')
            ->maxLength(100)
            ->dehydrated()
            ->required($required)
            ->placeholder('Masukkan nama jalan')
            ->dehydrateStateUsing(fn($state) => $state === '' ? null : $state);
    }

    public static function postalCode(?string $customField = null, ?bool $required = false): TextInput
    {
        return TextInput::make($customField ?? 'postal_code')
            ->label('Kode Pos')
            ->numeric()
            ->rules([
                'min_digits:5',
                'max_digits:5'
            ])
            ->dehydrated()
            ->required($required)
            ->placeholder('Masukkan kode pos')
            ->dehydrateStateUsing(fn($state) => $state === '' ? null : $state);
    }
}