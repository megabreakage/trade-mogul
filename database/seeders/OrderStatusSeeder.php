<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'identifier' => Str::uuid(),
                'name' => $status
            ]);
        }
    }
}
