<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $benefits = [
            [
                'name' => 'SSS',
            ],
            [
                'name' => 'Pag-ibig',
            ],
            [
                'name' => 'Philhealth',
            ],
            [
                'name' => 'HMO',
            ],
            [
                'name' => 'Internet Allowance',
            ]
        ];

        Position::insert($benefits);

    }
}
