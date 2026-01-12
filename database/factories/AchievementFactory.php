<?php

namespace Database\Factories;

use App\Models\Achievement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AchievementFactory extends Factory
{
    protected $model = Achievement::class;

    public function definition(): array
    {
        return [
            'slug' => Str::uuid()->toString(),
            'institution_id' => 1,
            'name' => $this->faker->sentence(),
            'contestant' => $this->faker->name(),
            'organizer' => $this->faker->company(),
            'description' => $this->faker->realText(),
            'year' => $this->faker->year(),
            'achievement_level' => $this->faker->randomElement(['Nasional', 'Provinsi', 'Kabupaten', 'Internasional']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
