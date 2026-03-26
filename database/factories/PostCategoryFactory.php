<?php

namespace Database\Factories;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostCategoryFactory extends Factory
{
    protected $model = PostCategory::class;

    public function definition(): array
    {
        $name = $this->faker->sentence(2);

        return [
            'slug' => Str::slug($name),
            'name' => $name,
            'description' => $this->faker->realText(),
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
