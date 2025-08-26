<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['Male', 'Female']);

        return [
            // Relationship
            'user_id' => User::factory(), // will create a user
            'position_id' => Position::factory(), // will create a position

            // Unique employee number
            'employee_number' => strtoupper($this->faker->unique()->bothify('EMP###')),

            // Basic info
            'first_name' => $this->faker->firstName($gender === 'Male' ? 'male' : 'female'),
            'last_name' => $this->faker->lastName(),
            'middle_name' => $this->faker->optional()->firstName(),
            'suffix' => $this->faker->randomElement(['None', 'Jr', 'Sr', 'II', 'III', 'IV', 'V']),

            // Demographics
            'gender' => $gender,
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Widowed', 'Separated']),
            'nationality' => 'Filipino',
            'religion' => $this->faker->optional()->randomElement(['Catholic', 'Christian', 'Islam', 'Other']),
            'blood_type' => $this->faker->optional()->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'height' => $this->faker->optional()->numberBetween(150, 190), // cm
            'weight' => $this->faker->optional()->numberBetween(50, 100), // kg
            'date_of_birth' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'place_of_birth' => $this->faker->city(),
            'address' => $this->faker->address(),

            // Contact
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),

            // Emergency contact
            'emergency_contact_name' => $this->faker->name(),
            'emergency_contact_relationship' => $this->faker->randomElement(['Parent', 'Sibling', 'Spouse', 'Friend']),
            'emergency_contact_number' => $this->faker->phoneNumber(),

            // Government IDs
            'sss_number' => $this->faker->optional()->numerify('##-#######-#'),
            'philhealth_number' => $this->faker->optional()->numerify('##########'),
            'pagibig_number' => $this->faker->optional()->numerify('##########'),
            'tin_number' => $this->faker->optional()->numerify('###-###-###'),

            // Employment details
            'hire_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'employment_type' => $this->faker->randomElement([
                'Full-time', 'Part-time', 'Contract', 'Intern', 'Probationary', 'Seasonal'
            ]),
            'employment_status' => $this->faker->randomElement([
                'Active', 'Resigned', 'Terminated', 'Retired', 'Suspended'
            ]),

            // Other
            'photo' => null,
        ];
    }
}
