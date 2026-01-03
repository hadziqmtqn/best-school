<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Actions;

use App\Filament\Clusters\SchoolManagement\Resources\Employees\Schemas\UpdateEmployeeForm;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Model;

class EditEmployeeAction
{
    public static function action(): array
    {
        return [
            EditAction::make()
                ->modalHeading('Ubah Akun')
                ->schema(UpdateEmployeeForm::schema())
                ->mutateRecordDataUsing(function (Model $record, array $data): array {
                    $address = $record->employee?->address;

                    if ($address) {
                        $data['province'] = $address['province'] ?? null;
                        $data['city'] = $address['city'] ?? null;
                        $data['district'] = $address['district'] ?? null;
                        $data['village'] = $address['village'] ?? null;
                        $data['street'] = $address['street'] ?? null;
                        $data['postal_code'] = $address['postal_code'] ?? null;
                    }

                    return $data;
                })
                ->using(function (Model $record, array $data): Model {
                    $record->loadMissing('employee');
                    $employee = $record->employee;

                    $record->update($data);

                    $employee->update([
                        'address' => [
                            'Provinsi' => $data['province'] ?? null,
                            'Kota/Kab' => $data['city'] ?? null,
                            'Kecamatan' => $data['district'] ?? null,
                            'Desa' => $data['village'] ?? null,
                            'Jalan' => $data['street'] ?? null,
                            'Kode Pos' => $data['postal_code'] ?? null,
                        ]
                    ]);
                    return $record;
                })
        ];
    }
}