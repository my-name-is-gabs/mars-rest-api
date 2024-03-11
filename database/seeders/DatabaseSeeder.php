<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Set;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Set::factory()->create([
            'name' => 'science grade 6',
            'description' => 'may quiz kami bukas about sa solar system',
            'reviewer' => [
                [
                    "term" => "sunkisslola",
                    "definition" => "largest star in the solar system"
                ],
                [
                    "term" => "black holyshit",
                    "definition" => "gravity is 10x stronger and has event horizon",
                ],
                [
                    "term" => "jupiterrrss",
                    "definition" => "gas planet"
                ]
            ],
        'user_id' => 2
    ]);

    Set::factory()->create([
            'name' => 'computer',
            'description' => 'learning about computer parts',
            'reviewer' => [
                [
                    "term" => "network interface cardiB",
                    "definition" => "a device used to connect to internet"
                ],
                [
                    "term" => "flash driveer",
                    "definition" => "a secondary drive used to store data/files",
                ],
                [
                    "term" => "random access memories",
                    "definition" => "a primary storage"
                ]
            ],
        'user_id' => 2
    ]);
    }
}