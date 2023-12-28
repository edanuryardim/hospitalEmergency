<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('patients')->insert([
            [
                'name' => 'Alice',
                'surname' => 'Johnson',
                'phone' => '0555546462',
                'entry_date' => now(),
                'gender' =>'Male',
                'exit_date' => null,
                'diagnosis' => 'Fever',
                'intervention' => 'Prescribed medication',
                'doctor_id' => 1,  // Doktorun ID'sini uygun bir değerle değiştirin
                'nurse_id' => 1,   // Hemşirenin ID'sini uygun bir değerle değiştirin
       
            ],
            [
                'name' => 'Bob',
                'surname' => 'Miller',
                'gender' =>'Female',
                'phone' => '0555546447',
                'entry_date' => now(),
                'exit_date' => null,
                'diagnosis' => 'Sprained ankle',
                'intervention' => 'Applied ice pack',
                'doctor_id' => 2,  // Doktorun ID'sini uygun bir değerle değiştirin
                'nurse_id' => 2,   // Hemşirenin ID'sini uygun bir değerle değiştirin
            
            ],
        ]);
    }


}
