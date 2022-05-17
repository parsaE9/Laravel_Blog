<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '1'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '2'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '3'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '4'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '5'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '6'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '7'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '8'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '9'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '10'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privilege_user')->updateOrInsert(
            ['user_id' => '3', 'privilege_id' => '11'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
