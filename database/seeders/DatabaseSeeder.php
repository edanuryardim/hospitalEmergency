<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UserSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(NurseSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BedSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(DailyWorkSeeder::class);



    }
}
