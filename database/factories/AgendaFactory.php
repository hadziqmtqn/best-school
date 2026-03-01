<?php

namespace Database\Factories;

use App\Enums\StatusData;
use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AgendaFactory extends Factory
{
    protected $model = Agenda::class;

    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 years');

        $status = $this->faker->randomElement(array_keys(StatusData::options()));

        return [
            'slug' => Str::uuid()->toString(),
            'name' => $this->faker->text(50),
            'description' => $this->faker->text(),
            'start_date' => $startDate,
            'end_date' => Carbon::now()->subMonth(),
            'location' => $this->faker->city,
            'status' => $status,
            'published_at' => $startDate,
            'is_active' => $status == StatusData::PUBLISHED->value ?? false,
            'created_at' => $startDate,
            'updated_at' => $startDate,

            'user_id' => 1,
            'validated_by' => 1,
            'institution_id' => 1,
        ];
    }
}
