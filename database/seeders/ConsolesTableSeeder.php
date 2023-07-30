<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Console;

class ConsolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $gamesConfig = [
            [
                'name' => 'gb',
                'fullname' => 'Game Boy',
                'nasos' => false,
            ],
            [
                'name' => 'gbc',
                'fullname' => 'Game Boy Color',
                'nasos' => false,

            ],
            [
                'name' => 'gba',
                'fullname' => 'Game Boy Advance',
                'nasos' => false,

            ],
            [
                'name' => 'nes',
                'fullname' => 'Nintendo Entertaining System',
                'nasos' => false,

            ],
            [
                'name' => 'snes',
                'fullname' => 'Super Nintendo Entertaining System',
                'nasos' => false,

            ],
            [
                'name' => '64',
                'fullname' => 'Nintendo 64',
                'nasos' => false,

            ],
            [
                'name' => 'gamecube',
                'fullname' => 'Nintendo Gamecube',
                'nasos' => true,
            ],
            [
                'name' => 'ds',
                'fullname' => 'Nintendo DS',
                'nasos' => false,

            ],
            [
                'name' => '3ds',
                'fullname' => 'Nintendo 3DS',
                'nasos' => false,

            ],
            [
                'name' => 'psx',
                'fullname' => 'Play Station',
                'nasos' => false,

            ],
            [
                'name' => 'ps2',
                'fullname' => 'Play Station 2',
                'nasos' => false,

            ],
            [
                'name' => 'psp',
                'fullname' => 'Play Station Portable',
                'nasos' => false,

            ],
            [
                'name' => 'dreamcast',
                'fullname' => 'Sega Dreamcast',
                'nasos' => false,

            ],
            [
                'name' => 'wii',
                'fullname' => 'Nintendo Wii',
                'nasos' => true,
            ],
            [
                'name' => 'switch',
                'fullname' => 'Nintendo Switch',
                'nasos' => false,

            ],
            [
                'name' => 'genesis',
                'fullname' => 'Sega Genesis',
                'nasos' => false,

            ],
        ];
        foreach ($gamesConfig as $game) {
            // Use firstOrCreate to prevent duplicates based on the 'name' attribute
            Console::firstOrCreate(['name' => $game['name']], [
                'fullname' => $game['fullname'],
                'nasos' => isset($game['nasos']) ? $game['nasos'] : false,
            ]);
        }
    }
}
