<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ['Nairobi', 'Mombasa', 'Nakuru', 'Kisumu'];

        foreach ($locations as $location) {
            Location::create([
                'identifier' => generate_identifier(),
                'name' => $location
            ]);
        }
    }
}
