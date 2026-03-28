<?php

namespace Database\Factories;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Random\RandomException;

class FacilityFactory extends Factory
{
    protected $model = Facility::class;

    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'slug' => Str::uuid()->toString(),
            'name' => $this->faker->sentence(5),
            'description' => $this->faker->realText(100),
            'construction_year' => random_int(2005, 2023),
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'institution_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
