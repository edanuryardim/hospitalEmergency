<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        DB::table('doctors')->insert([
            [
                'name' => 'Nupelda',
                'surname' => 'Kandemir',
                'email' => 'nupelkan@gmail.com',
                'phone' => '05321234567',
                'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
                'specialty' => 'Dermatologist',
                'address' => 'Kadıköy',
                'birth_date' => '1990-01-01',
                'gender' => 'Female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fatma',
                'surname' => 'Yavuz',
                'email' => 'fatyav@gmail.com',
                'phone' => '05551234567',
                'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
                'specialty' => 'Internal Medicine',
                'address' => 'Şişli',
                'birth_date' => '1985-05-10',
                'gender' => 'Male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Öykü',
                'surname' => 'Karakuzulu',
                'email' => 'oykara@gmail.com',
                'phone' => '05551234568',
                'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
                'specialty' => 'Pediatrician',
                'address' => 'Beşiktaş',
                'birth_date' => '1980-08-15',
                'gender' => 'Female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ela',
                'surname' => 'Yardım',
                'email' => 'elaya@gmail.com',
                'phone' => '05551234569',
                'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
                'specialty' => 'Cardiologist',
                'address' => 'Üsküdar',
                'birth_date' => '1975-12-20',
                'gender' => 'Female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Süleyman',
                'surname' => 'Kan',
                'email' => 'suleymank4@gmail.com',
                'phone' => '05551234570',
                'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
                'specialty' => 'Neurologist',
                'address' => 'Kadıköy',
                'birth_date' => '1982-03-25',
                'gender' => 'Female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);



    }
}
