<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GeneralSettingSeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
//            BenefitSeeder::class,
//            EmployeeSeeder::class,
        ]);
    }
}
