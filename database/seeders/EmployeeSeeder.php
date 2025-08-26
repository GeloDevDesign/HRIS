<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Employee::insert([
            [
                'user_id' => 1,
                'position_id' => 1,
                'employee_number' => 'EMP001',
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'middle_name' => 'Santos',
                'suffix' => 'None',
                'gender' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'religion' => 'Catholic',
                'blood_type' => 'O+',
                'height' => 170,
                'weight' => 65,
                'date_of_birth' => '1990-05-15',
                'place_of_birth' => 'Quezon City',
                'address' => '123 Manila St, Quezon City',
                'phone_number' => '09171234567',
                'email' => 'juan.delacruz@example.com',
                'emergency_contact_name' => 'Maria Dela Cruz',
                'emergency_contact_relationship' => 'Mother',
                'emergency_contact_number' => '09181234567',
                'sss_number' => '12-3456789-0',
                'philhealth_number' => '1234567890',
                'pagibig_number' => '1234567890',
                'tin_number' => '123-456-789',
                'hire_date' => '2020-01-10',
                'employment_type' => 'Full-time',
                'employment_status' => 'Active',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'position_id' => 2,
                'employee_number' => 'EMP002',
                'first_name' => 'Maria',
                'last_name' => 'Reyes',
                'middle_name' => null,
                'suffix' => 'None',
                'gender' => 'Female',
                'civil_status' => 'Married',
                'nationality' => 'Filipino',
                'religion' => 'Christian',
                'blood_type' => 'A+',
                'height' => 160,
                'weight' => 55,
                'date_of_birth' => '1992-08-25',
                'place_of_birth' => 'Cebu City',
                'address' => '456 Cebu Ave, Cebu City',
                'phone_number' => '09281234567',
                'email' => 'maria.reyes@example.com',
                'emergency_contact_name' => 'Jose Reyes',
                'emergency_contact_relationship' => 'Husband',
                'emergency_contact_number' => '09391234567',
                'sss_number' => '98-7654321-0',
                'philhealth_number' => '0987654321',
                'pagibig_number' => '0987654321',
                'tin_number' => '987-654-321',
                'hire_date' => '2021-03-15',
                'employment_type' => 'Part-time',
                'employment_status' => 'Active',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
