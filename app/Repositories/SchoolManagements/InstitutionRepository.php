<?php

namespace App\Repositories\SchoolManagements;

use App\Helpers\UserRole;
use App\Models\Institution;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class InstitutionRepository
{
    public function options(): array
    {
        $user = auth()->user()->loadMissing('homebaseActive');

        return Institution::query()
            ->when(!UserRole::isSuperAdmin(), function (Builder $query) use ($user) {
                $query->where('id', $user?->homebaseActive?->institution_id);
            })
            ->get()
            ->mapWithKeys(fn(Institution $institution) => [$institution->id => $institution->name])
            ->toArray();
    }

    public function identity(Institution $institution): array
    {
        return [
            'baseData' => [
                'Nama Sekolah' => $institution->name,
                'Jenjang' => $institution->educationalLevel?->full_name,
                'NPSN' => $institution->npsn,
                'Status' => $institution->status,
                'SK Pendirian Sekolah' => $institution->school_establishment_decree,
                'Tanggal SK Pendirian' => $institution->date_establishment_decree,
                'SK Izin Operasional' => $institution->operational_permit_decree,
                'Tanggal SK Izin Operasional' => $institution->date_operational_permit_decree,
                'Email' => $institution->email,
                'No. Telp.' => $institution->phone_number,
            ],
            'address' => [
                'Alamat' => $institution->street,
                'Desa' => Str::title($institution->village),
                'Kecamatan' => Str::title($institution->district),
                'Kota/Kab.' => Str::title($institution->city),
                'Provinsi' => Str::title($institution->province),
                'Kode Pos' => $institution->postal_code
            ],
            'profile' => $institution->profile
        ];
    }

    public function vision(Institution $institution): ?string
    {
        return Post::find($institution->more_info['vision_page_id'] ?? null)?->content;
    }
}
