<?php

namespace Database\Seeders\Setting;

use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $application = new Application();
        $application->slug = Str::uuid()->toString();
        $application->name = 'Best School';
        $application->short_name = 'BS';
        $application->email = 'superadmin@bkn.my.id';
        $application->phone_number = '6285157088717';
        $application->motto = 'Hari ini berjuang, besok raih kemenangan!';
        $application->description = 'Portal informasi terpadu yang menyajikan profil, prestasi, dan agenda kegiatan sebagai wajah digital sekolah yang profesional, transparan, dan mudah diakses publik';
        $application->address = 'Jl. Pendidikan No. 123, Kebayoran Baru, Jakarta Selatan, DKI Jakarta 12160';
        $application->social_media = [
            'facebook' => 'https://www.facebook.com/khadziq.muttaqin.17',
            'instagram' => 'https://www.instagram.com/hadziq____',
            'threads' => 'https://www.threads.com/@hadziq____',
            'x' => null,
        ];
        $application->more_info = [
            'accreditation_score' => 'A',
            'accreditation_name' => 'Terakreditasi Unggul',
            'cta_title' => 'Dapatkan Beasiswa Penuh!',
            'cta_description' => 'Berprestasi di akademik atau memiliki kemampuan ekstrakurikuler luar biasa? Daftar sekarang melalui jalur prestasi dan dapatkan pendidikan bebas biaya hingga lulus!',
            'cta_url' => 'https://ppdb.bkn.my.id',
            'cta_btn_label' => 'Info Syarat & Daftar',
        ];
        $application->save();
    }
}
