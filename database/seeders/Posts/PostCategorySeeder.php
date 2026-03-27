<?php

namespace Database\Seeders\Posts;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->categories() as $category) {
            PostCategory::create([
                'slug' => Str::uuid()->toString(),
                'name' => $category['name'],
                'description' => $category['description']
            ]);
        }
    }

    private function categories(): array
    {
        return [
          [
              "name" => "Berita & Kegiatan",
              "description" => "Liputan terkini mengenai peristiwa, acara, dan aktivitas harian yang berlangsung di lingkungan sekolah."
          ],
          [
              "name" => "Prestasi",
              "description" => "Ruang apresiasi untuk pencapaian gemilang siswa, guru, maupun staf baik di bidang akademik maupun non-akademik."
          ],
          [
              "name" => "Pengumuman Akademik",
              "description" => "Informasi resmi terkait kurikulum, jadwal ujian, kalender pendidikan, dan prosedur administrasi sekolah."
          ],
          [
              "name" => "Karya & Literasi",
              "description" => "Wadah kreativitas bagi siswa dan guru untuk mempublikasikan esai, cerpen, puisi, dan karya tulis inspiratif lainnya."
          ],
          [
              "name" => "Ekstrakurikuler",
              "description" => "Informasi lengkap mengenai jadwal, profil, dan dokumentasi kegiatan pengembangan minat dan bakat siswa."
          ],
          [
              "name" => "Parenting & Edukasi",
              "description" => "Artikel panduan bagi orang tua dan siswa mengenai tips belajar, kesehatan mental, dan pola asuh anak."
          ],
          [
              "name" => "Opini Guru",
              "description" => "Artikel pemikiran dan refleksi dari tenaga pendidik mengenai inovasi pembelajaran dan dunia pendidikan."
          ]
        ];
    }
}
