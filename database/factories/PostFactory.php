<?php

namespace Database\Factories;

use App\Enums\PostVisibility;
use App\Enums\StatusData;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->text(100);
        $visibility = $this->faker->randomElement(array_keys(PostVisibility::options()));
        $postCategory = PostCategory::pluck('id');

        return [
            'slug' => Str::slug($title),
            'title' => $title,
            'type' => 'post',
            'content' => $this->faker->text(500),
            'post_category_id' => $postCategory->random(),
            'status' => $this->faker->randomElement(array_keys(StatusData::options())),
            'visibility' => $visibility,
            'password' => $visibility === PostVisibility::PRIVATE->value ? Str::random(10) : null,
            'allow_comment' => true,
            'tags' => $this->faker->words(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => 1,
            'reviewed_by' => 1,
        ];
    }
}
