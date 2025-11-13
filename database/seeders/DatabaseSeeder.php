<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appel des seeders pour remplir les tables
        $this->call([
            UniversitySeeder::class,
            SiteSeeder::class,
            FiliereSeeder::class,
            StudentSeeder::class,
        ]);
    }
}