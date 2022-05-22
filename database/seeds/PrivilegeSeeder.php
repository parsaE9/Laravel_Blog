<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->updateOrInsert(
            ['name' => 'user_list'],
            [
                'id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'user_create'],
            [
                'id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'user_edit'],
            [
                'id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'user_delete'],
            [
                'id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_list'],
            [
                'id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_create'],
            [
                'id' => '6',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_edit'],
            [
                'id' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_delete'],
            [
                'id' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        DB::table('privileges')->updateOrInsert(
            ['name' => 'blog_list'],
            [
                'id' => '9',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'blog_edit'],
            [
                'id' => '10',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'blog_delete'],
            [
                'id' => '11',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
