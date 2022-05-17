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
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'user_create'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'user_edit'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'user_delete'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_list'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_create'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_edit'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'admin_delete'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        DB::table('privileges')->updateOrInsert(
            ['name' => 'blog_list'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'blog_edit'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('privileges')->updateOrInsert(
            ['name' => 'blog_delete'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
