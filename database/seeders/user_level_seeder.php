<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserLevel;

class user_level_seeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $adminExists = UserLevel::where('level', 'admin')->exists();
            $salesExists = UserLevel::where('level', 'sales')->exists();
    
            if (!$adminExists) {
                UserLevel::factory()->create(['level' => 'admin']);
            }
    
            if (!$salesExists) {
                UserLevel::factory()->create(['level' => 'sales']);
            }
        }
    
}
