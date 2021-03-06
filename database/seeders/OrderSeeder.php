<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            Order::create([
                'identifier' => generate_identifier(),
                'order_number' => 'TM-' . rand(0001, 9999),
                'order_status_id' => 1,
                'location_id' => 2,
                'destination_id' => 1
            ]);
        }
    }
}
