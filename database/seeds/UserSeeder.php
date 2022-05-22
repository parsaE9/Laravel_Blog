<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 2 normal users
        DB::table('users')->updateOrInsert(
            ['username' => 'reza', 'email' => 'reza@gmail.com'],
            [
                'id' => '1',
                'username' => 'reza',
                'privilege' => '1',
                'email' => 'reza@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('users')->updateOrInsert(
            ['username' => 'ali', 'email' => 'ali@gmail.com'],
            [
                'id' => '2',
                'username' => 'ali',
                'privilege' => '1',
                'email' => 'ali@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        // 1 admin user
        DB::table('users')->updateOrInsert(
            ['username' => 'parsa', 'email' => 'parsa@gmail.com'],
            [
                'id' => '3',
                'username' => 'parsa',
                'privilege' => '2',
                'email' => 'parsa@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
