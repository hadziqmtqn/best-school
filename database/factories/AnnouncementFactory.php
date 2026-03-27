<?php

namespace Database\Factories;

use App\Enums\StatusData;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AnnouncementFactory extends Factory
{
    protected $model = Announcement::class;

    public function definition(): array
    {
        return [
            'slug' => Str::uuid()->toString(),
            'name' => $this->faker->text(50),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement(array_keys(StatusData::options())),
            'is_active' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => 1,
            'validated_by' => 1,
            'institution_id' => 1,
        ];
    }
}
