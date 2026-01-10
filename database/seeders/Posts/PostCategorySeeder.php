<?php

namespace Database\Seeders\Posts;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        PostCategory::factory(5)
            ->create();
    }
}
