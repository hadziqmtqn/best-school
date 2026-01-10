<?php

namespace Database\Factories;

use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ExtracurricularFactory extends Factory
{
    protected $model = Extracurricular::class;

    public function definition(): array
    {
        return [
            'slug' => Str::uuid()->toString(),
            'name' => $this->faker->sentence(5),
            'description' => $this->faker->realText(100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'institution_id' => 1,
        ];
    }
}
