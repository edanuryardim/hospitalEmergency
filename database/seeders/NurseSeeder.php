<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nurses')->insert([[
            'name' => 'Ayşe',
            'surname' => 'Demir',
            'email' => 'ayse@example.com',
            'phone' => '05551234567',
            'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
            'address' => 'Üsküdar',
            'birth_date' => '1992-03-15',
            'gender' => 'Female',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Fatma',
            'surname' => 'Yılmaz',
            'email' => '
            fatma@example.com',
            'phone' => '05551234567',
            'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
            'address' => 'Üsküdar',
            'birth_date' => '1992-03-15',
            'gender' => 'Female',
            'created_at' => now(),
            'updated_at' => now(),

        ],
    [
        'name' => 'Ali',
        'surname' => 'Yılmaz',
        'email' => '
        ali@example.com',
        'phone' => '05551234567',
        'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
        'address' => 'Üsküdar',
        'birth_date' => '1992-03-15
        ',
        'gender' => 'Male',
        'created_at' => now(),
        'updated_at' => now(),

    ],
    [
        'name' => 'Öykü',
        'surname' => 'Karakuzulu',
        'email' => '
        oyku@example.com',
        'phone' => '05551234567',
        'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
        'address' => 'Antep',
        'birth_date' => '2002-03-15',
        'gender' => 'Female',
        'created_at' => now(),
        'updated_at' => now(),
    ], [
        'name' => 'Mehmet',
        'surname' => 'Yılmaz',
        'email' => '
        mehmet@example.com',
        'phone' => '05551234567',
        'image' => 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200',
        'address' => 'Üsküdar',
        'birth_date' => '1992-03-15
        ',
        'gender' => 'Male',
        'created_at' => now(),
        'updated_at' => now(),
    ]]
    );

    }
}
