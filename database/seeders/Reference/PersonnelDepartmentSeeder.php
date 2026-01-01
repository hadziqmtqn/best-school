<?php

namespace Database\Seeders\Reference;

use App\Models\PersonnelDepartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PersonnelDepartmentSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->list() as $index => $item) {
            PersonnelDepartment::create([
                'slug' => Str::slug($item),
                'name' => $item,
                'level' => $index + 1
            ]);
        }
    }

    private function list(): array
    {
        return [
            'Kepala Sekolah',
            'Wakil Kepala Sekolah',
            'Guru Kelas',
            'Guru Pengganti',
            'Bendahara',
            'Sekretaris',
            'Guru Bimbingan dan Konseling',
            'Tata Usaha',
            'Pustakawan',
            'Penjaga Sekolah',
            'Petugas Kebersihan',
            'Pengemudi/Pesuruh'
        ];
    }
}
