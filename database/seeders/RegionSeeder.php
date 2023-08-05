<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $regions = [
            [
                'name' => 'North America',
                'code' => 'USA',
            ],
            [
                'name' => 'Europe',
                'code' => 'EUR',
            ],
            [
                'name' => 'Japan',
                'code' => 'JPN',
            ],
            [
                'name' => 'Region Free',
                'code' => 'RF',
            ],

        ];
        foreach ($regions as $region) {
            // Use firstOrCreate to prevent duplicates based on the 'name' attribute
            Region::firstOrCreate(['name' => $region['name']], [
                'code' => isset($region['code'])
            ]);
        }
    }
}
