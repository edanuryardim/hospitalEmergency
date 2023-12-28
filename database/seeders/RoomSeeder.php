<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            'room_number' => 1,
            'bed_count' => 2,
            'available_beds' => 2,
        ]);

        DB::table('rooms')->insert([
            'room_number' => 2,
            'bed_count' => 2,
            'available_beds' => 2,
        ]);

        DB::table('rooms')->insert([
            'room_number' => 3,
            'bed_count' => 2,
            'available_beds' => 2,
        ]);

        DB::table('rooms')->insert([
            'room_number' => 4,
            'bed_count' => 2,
            'available_beds' => 2,
        ]);

        DB::table('rooms')->insert([
            'room_number' => 5,
            'bed_count' => 2,
            'available_beds' => 2,
        ]);


    }
}
