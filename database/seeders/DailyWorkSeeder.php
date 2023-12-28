<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DailyWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $doctors = DB::table('doctors')->pluck('id');
        $nurses = DB::table('nurses')->pluck('id');

        $dates = ['2023-12-01', '2023-12-02', '2023-12-03', '2023-12-04', '2023-12-05'];

        foreach ($dates as $date) {
            DB::table('daily_works')->insert([
                'doctor_id' => $doctors->random(),
                'nurse1_id' => $nurses->random(),
                'nurse2_id' => $nurses->random(),
                'nurse3_id' => $nurses->random(),
                'date' => $date,
                'patient_count' => rand(0, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

}}}
