<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'manager_id' => 1,
                'department_name' => 'Human Resources',
                'description' => 'Handles recruitment, employee relations, and payroll management.',
            ],
            [
                'manager_id' => 1,
                'department_name' => 'Information Technology',
                'description' => 'Responsible for system administration, software development, and IT support.',
            ],
            [
                'manager_id' => 1,
                'department_name' => 'Finance',
                'description' => 'Manages company finances including accounting, budgeting, and auditing.',
            ],
            [
                'manager_id' => 1,
                'department_name' => 'Marketing',
                'description' => 'Focuses on brand promotion, advertising campaigns, and market research.',
            ],
            [
                'manager_id' => 1,
                'department_name' => 'Operations',
                'description' => 'Oversees day-to-day operations and ensures business efficiency.',
            ],
        ];

        Department::insert($departments);
    }
}
