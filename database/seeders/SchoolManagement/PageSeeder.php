<?php

namespace Database\Seeders\SchoolManagement;

use App\Enums\NavigationCategory;
use App\Models\Navigation;
use App\Models\Post;
use App\Models\SubNavigation;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
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
                'visibility' => 'published',
                'status' => 'public',
                'allow_comment' => false,
                'user_id' => 1,
                'reviewed_by' => 1
            ]);

            $this->subNavigation($navigation->id, $title, null, $post->id);
        }

        $this->subNavigation($navigation->id, 'Pendidik', NavigationCategory::TEACHER->value);
    }

    private function subNavigation($navigationId, $title, $category = null, $pageId = null): void
    {
        $subNavigation = new SubNavigation();
        $subNavigation->slug = Str::uuid()->toString();
        $subNavigation->navigation_id = $navigationId;
        $subNavigation->category = $category;
        $subNavigation->name = $title;
        $subNavigation->post_id = $pageId;
        $subNavigation->save();
    }
}
