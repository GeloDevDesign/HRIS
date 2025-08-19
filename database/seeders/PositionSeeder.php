<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'department_id' => 1,
                'title' => 'Jr Software Developer',
                'base_salary' => 20000,
            ],
            [
                'department_id' => 1,
                'title' => 'Sr Software Developer',
                'base_salary' => 120000,
            ],
            [
                'department_id' => 1,
                'title' => 'Quality Assurance',
                'base_salary' => 120000,
            ],
            [
                'department_id' => 1,
                'title' => 'Project Manager',
                'base_salary' => 120000,
            ],
        ];

        Position::insert($positions);
    }
}
