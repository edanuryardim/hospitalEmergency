<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('users')->insert([[
            'name' => 'Eda Yardım',
            'email' => 'edayardim@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123'),
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Selen Kaya',
            'email' => 'selen@gmail.com',
            'role' => 'secretary',
            'password' => bcrypt('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]]
        );


    }
}
