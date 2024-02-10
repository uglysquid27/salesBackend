<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Paket::factory()->create(['paket' => 'paket1', 'price' => '100000']);
        Paket::factory()->create(['Paket' => 'paket2', 'price' => '200000']);
        Paket::factory()->create(['Paket' => 'paket3', 'price' => '300000']);
    }
}
