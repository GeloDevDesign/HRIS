<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefit>
 */
class BenefitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $benefits = ['SSS', 'Pag-ibig', 'Philhealth', 'HMO', 'Laundry', 'Rice 50kg'];

        return [
            //
            'name' => fake()->randomElement($benefits),
        ];
    }
}
