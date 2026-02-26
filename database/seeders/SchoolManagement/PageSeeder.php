<?php

namespace Database\Seeders\SchoolManagement;

use App\Enums\NavigationCategory;
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

        foreach ($rows as $row) {
            $title = $row['title'];

            $post = Post::create([
                'slug' => Str::slug($title),
                'title' => $title,
                'content' => $row['content'],
                'type' => 'page',
                'status' => 'published',
                'visibility' => 'public',
                'allow_comment' => false,
                'user_id' => 1,
                'reviewed_by' => 1
            ]);

            $this->subNavigationRepository->subNavigation($navigation->id, $title, null, $post->id);
        }

        $this->subNavigationRepository->subNavigation($navigation->id, 'Pendidik', NavigationCategory::TEACHER->value);
    }
}
