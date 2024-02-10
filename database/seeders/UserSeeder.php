<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminLevelId = DB::table('user_levels')->where('level', 'admin')->value('id');
        $salesLevelId = DB::table('user_levels')->where('level', 'sales')->value('id');

        DB::table('users')->insert([
            'name' => 'Admin',
            'user_level' => $adminLevelId,
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Sales',
            'user_level' => $salesLevelId,
            'email' => 'sales@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
