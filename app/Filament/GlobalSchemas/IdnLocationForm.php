<?php

namespace App\Filament\GlobalSchemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Http;

class IdnLocationForm
{
    public static function province(?string $customField = null, ?bool $required = false): Select
    {
        return Select::make($customField ?? 'province')
            ->label('Provinsi')
            ->searchable()
            ->getSearchResultsUsing(function (string $search) {
                $response = Http::get('https://idn-location.bkn.my.id/api/v1/provinces', [
                    'q' => $search,
                ]);
                return collect($response->json())->pluck('name', 'name')->toArray();
            })
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
            ->getSearchResultsUsing(function (string $search, $get) {
                $province = $get('province');
                if (!$province) return [];
                $response = Http::get('https://idn-location.bkn.my.id/api/v1/cities', [
                    'province' => $province,
                    'q' => $search,
                ]);
                return collect($response->json())->pluck('name', 'name')->toArray();
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
            ->getSearchResultsUsing(function (string $search, $get) {
                $city = $get('city');
                if (!$city) return [];
                $response = Http::get('https://idn-location.bkn.my.id/api/v1/districts', [
                    'city' => $city,
                    'q' => $search,
                ]);
                return collect($response->json())->pluck('name', 'name')->toArray();
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
            ->getSearchResultsUsing(function (string $search, $get) {
                $district = $get('district');
                if (!$district) return [];
                $response = Http::get('https://idn-location.bkn.my.id/api/v1/villages', [
                    'district' => $district,
                    'q' => $search,
                ]);
                return collect($response->json())->pluck('name', 'name')->toArray();
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