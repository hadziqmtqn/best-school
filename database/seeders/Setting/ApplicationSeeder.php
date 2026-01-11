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
        $application->description = 'Portal informasi terpadu yang menyajikan profil, prestasi, dan agenda kegiatan sebagai wajah digital sekolah yang profesional, transparan, dan mudah diakses publik';
        $application->social_media = [
            'facebook' => 'https://www.facebook.com/khadziq.muttaqin.17',
            'instagram' => 'https://www.instagram.com/hadziq____',
            'threads' => 'https://www.threads.com/@hadziq____',
            'x' => null,
        ];
        $application->save();
    }
}
