<?php

namespace Database\Seeders\Posts;

use App\Models\LeadershipGreeting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LeadershipGreatingSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Sambutan Pimpinan';

        $headMaster = User::query()
            ->whereHas('employeePositionActive', fn($query) => $query->where('personnel_department_id', 1))
            ->first();

        LeadershipGreeting::create([
            'slug' => Str::slug($title),
            'title' => $title,
            'message' => '<p>Puji syukur ke hadirat Allah <em>Subhanahu Wa Ta&#039;ala</em> atas rahmat dan karunia-Nya sehingga lembaga ini dapat terus berperan aktif dalam memberikan kontribusi nyata bagi masyarakat.</p><p>Website resmi ini kami hadirkan sebagai sarana informasi, komunikasi, dan transparansi kepada seluruh pemangku kepentingan, baik peserta didik, orang tua, mitra, maupun masyarakat luas.</p><p>Lembaga kami didirikan dengan komitmen kuat untuk mengembangkan sumber daya manusia yang berkualitas, berkarakter, dan memiliki kepedulian sosial. Melalui berbagai program pendidikan dan kegiatan pendukung, kami senantiasa berupaya menciptakan lingkungan yang kondusif, inovatif, serta berorientasi pada peningkatan mutu dan pelayanan.</p><p>Akhir kata, kami mengucapkan terima kasih atas kepercayaan dan dukungan yang telah diberikan. Semoga kehadiran website ini dapat memberikan manfaat serta menjadi jembatan yang mempererat sinergi dalam mewujudkan visi dan misi lembaga. Kritik dan saran yang membangun sangat kami harapkan demi kemajuan bersama.</p><p>Hormat kami,<br><strong>Ketua/Pimpinan Lembaga</strong><br></p><p>[Nama Pimpinan]</p>',
            'user_id' => $headMaster?->id,
        ]);
    }
}
