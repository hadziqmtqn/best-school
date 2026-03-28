<?php

namespace Database\Seeders\Reference;

use App\Models\PersonnelDepartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PersonnelDepartmentSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->list() as $item) {
            PersonnelDepartment::create([
                'slug' => Str::slug($item['name']),
                'name' => $item['name'],
                'level' => $item['level']
            ]);
        }
    }

    private function list(): array
    {
        return [
            [
                'name' => 'Kepala Sekolah',
                'level' => 1
            ],
            [
                'name' => 'Wakil Kepala Sekolah',
                'level' => 1
            ],
            [
                'name' => 'Bendahara',
                'level' => 2
            ],
            [
                'name' => 'Sekretaris',
                'level' => 2
            ],
            [
                'name' => 'Wali Kelas',
                'level' => 3
            ],
            [
                'name' => 'Guru Pengganti',
                'level' => 3
            ],
            [
                'name' => 'Guru Bimbingan dan Konseling',
                'level' => 3
            ],
            [
                'name' => 'Tata Usaha',
                'level' => 4
            ],
            [
                'name' => 'Pustakawan',
                'level' => 4
            ],
            [
                'name' => 'Penjaga Sekolah',
                'level' => 4
            ],
            [
                'name' => 'Petugas Kebersihan',
                'level' => 4
            ],
            [
                'name' => 'Pengemudi/Pesuruh',
                'level' => 4
            ],
        ];
    }
}
