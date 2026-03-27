<?php

namespace Database\Factories;

use App\Enums\PostVisibility;
use App\Enums\StatusData;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();
        $visibility = $this->faker->randomElement(array_keys(PostVisibility::options()));
        $postCategory = PostCategory::pluck('id');

        $content = '<p>'. $this->faker->realText(500) .'</p>';
        $content .= '<p>'. $this->faker->realText() .'</p>';
        $content .= '<p>'. $this->faker->realText(300) .'</p>';
        $content .= '<p>'. $this->faker->realText() .'</p>';

        $writer = User::whereHas('roles', fn($query) => $query->where('name', '!=', 'super_admin'))
            ->pluck('id');

        return [
            'slug' => Str::slug($title),
            'title' => $title,
            'type' => 'post',
            'content' => $content,
            'post_category_id' => $postCategory->random(),
            'status' => $this->faker->randomElement(array_keys(StatusData::options())),
            'visibility' => $visibility,
            'password' => $visibility === PostVisibility::PRIVATE->value ? Str::random(10) : null,
            'allow_comment' => true,
            'tags' => $this->faker->words(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => $writer->random(),
            'reviewed_by' => 1,
        ];
    }
}
