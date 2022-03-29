<?php

namespace Database\Seeders;

use App\Models\FleetStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FleetStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Available', 'Loading', 'On Transit'];

        foreach ($statuses as $status) {
            FleetStatus::create([
                'identifier' => generate_identifier(),
                'name' => $status
            ]);
        }
    }
}
