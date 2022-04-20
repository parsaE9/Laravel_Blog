<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        // 1 admin user
        DB::table('users')->insert([
            'username' => 'parsa',
            'privilege' => 'admin',
            'email' => 'parsa@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2 normal users
        DB::table('users')->insert([
            'username' => 'reza',
            'privilege' => 'normal',
            'email' => 'reza@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'ali',
            'privilege' => 'normal',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
