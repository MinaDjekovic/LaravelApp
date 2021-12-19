<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'index' => $this->faker->unique()->numberBetween($min = 1, $max = 1000),
            'faculty_id' => $this->faker->numberBetween($min = 1, $max = 20),
        ];
    }
}
