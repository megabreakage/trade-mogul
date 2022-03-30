<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Pending', 'Loading', 'Dispatched', 'Delivered'];

        foreach ($statuses as $status) {
            OrderStatus::create([
                'identifier' => generate_identifier(),
                'name' => $status
            ]);
        }
    }
}
