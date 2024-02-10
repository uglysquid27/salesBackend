<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->create([
            'name' => 'test1', 
            'num_phone' => '100000',
            'address' => 'Lawang',
            'paket_id' => '1',
            'identity_card' => 'ktp.jpg',
            'house_photo' => 'rumah.png'
        ]);
    }
}
