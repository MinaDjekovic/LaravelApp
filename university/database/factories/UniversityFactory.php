<?php

namespace Database\Factories;

use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;


class UniversityFactory extends Factory
{
    protected $model = University::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'University of ' . $this->faker->state,
            'address' => $this->faker->streetAddress . ' ' . $this->faker->city,
            'world_rank' => $this->faker->numberBetween($min = 1, $max = 1000),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 4)
        ];
    }
}
