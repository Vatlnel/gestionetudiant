<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        


    Filiere::create([
        'name' => 'Algorithme',
        'code' => 'ALGO01',
        'university_id' => 1,
        'site_id' => 1,
    ]);

    Filiere::create([
        'name' => 'Mérise',
        'code' => 'MER02',
        'university_id' => 2,
        'site_id' => 2,
    ]);
}
    }

