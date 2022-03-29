<?php

namespace Database\Seeders;

use App\Models\Fleet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FleetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trucks = [
            [
                'registration_number' => 'KCW695D',
                'model' => 'Mercedes Actros',
                'manufactured_at' => '2019-01-01'
            ], [
                'registration_number' => 'KDA619G',
                'model' => 'Renault',
                'manufactured_at' => '2020-02-10'
            ], [
                'registration_number' => 'KDG350N',
                'model' => 'Scania',
                'manufactured_at' => '2021-03-20'
            ]
        ];

        foreach ($trucks as $truck) {
            Fleet::create([
                'identifier' => generate_identifier(),
                'fleet_status_id' => 1,
                'registration_number' => $truck['registration_number'],
                'model' => $truck['model'],
                'manufactured_at' => $truck['manufactured_at']
            ]);
        }
    }
}
