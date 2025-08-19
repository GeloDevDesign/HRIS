<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->first()->id ?? 1,
            'title' => $this->faker->jobTitle(),
            'base_salary' => $this->faker->numberBetween(15000, 120000),
        ];
    }
}
