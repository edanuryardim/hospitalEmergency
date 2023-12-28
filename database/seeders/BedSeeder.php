<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beds')->insert([
            'room_id' => 1,
            'bed_number' => 1,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 1, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 2,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 2, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 1,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 2, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 2,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 3, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 1,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 3, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 2,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 4, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 1,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 4, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 2,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 5, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 1,
            'is_occupied' => false,
        ]);

        DB::table('beds')->insert([
            'room_id' => 5, // Odanın ID'sini uygun bir değerle değiştirin
            'bed_number' => 2,
            'is_occupied' => false,
        ]);


    }
}
