<?php

namespace Database\Seeders\SchoolManagement;

use App\Enums\NavigationCategory;
use App\Models\Institution;
use App\Models\Navigation;
use App\Models\Post;
use App\Repositories\Settings\SubNavigationRepository;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    protected SubNavigationRepository $subNavigationRepository;

    /**
     * @param SubNavigationRepository $subNavigationRepository
     */
    public function __construct(SubNavigationRepository $subNavigationRepository)
    {
        $this->subNavigationRepository = $subNavigationRepository;
    }

    /**
     * @throws FileNotFoundException
     */
    public function run(): void
    {
        $rows = json_decode(File::get(database_path('import/school-managements/pages.json')), true);

        $navigation = new Navigation();
        $navigation->slug = Str::uuid()->toString();
        $navigation->serial_number = 1;
        $navigation->name = 'Profil';
        $navigation->save();

        // PROFILE
        $profileRow = $rows[0]['profil'];
        if ($profileRow) {
            $profile = $this->createPage(title: $profileRow['title'], content: $profileRow['content']);
            $this->subNavigationRepository->subNavigation($navigation->id, $profile->title, null, $profile->id);
        }

        // VISI MISI
        $visionRow = $rows[1]['visi_misi'];
        if ($visionRow) {
            $vision = $this->createPage(title: $visionRow['title'], content: $visionRow['content']);
            $this->subNavigationRepository->subNavigation($navigation->id, $vision->title, null, $vision->id);

            // VISI & MISI SEKOLAH
            $this->vision($vision->content);
        }

        $this->subNavigationRepository->subNavigation($navigation->id, 'Pendidik', NavigationCategory::TEACHER->value);
    }

    private function vision($content): void
    {
        foreach (Institution::all() as $institution) {
            $page = $this->createPage(
                title: 'Visi dan Misi ' . $institution->name,
                content: $content
            );

            $institution->update([
                'more_info' => [
                    'vision_page_id' => $page->id
                ]
            ]);
        }
    }

    private function createPage($title, $content): Post
    {
        return Post::create([
            'slug' => Str::slug($title),
            'title' => $title,
            'content' => $content,
            'type' => 'page',
            'status' => 'published',
            'visibility' => 'public',
            'allow_comment' => false,
            'user_id' => 1,
            'reviewed_by' => 1
        ]);
    }
}
