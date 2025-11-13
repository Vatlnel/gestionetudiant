<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 use App\Models\Site;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

public function run(): void
{
    Site::create([
        'university_id' => 2,
        'name' => 'Akpakpa',
        'address' => 'Quartier Ph10',
    ]);

    Site::create([
        'university_id' => 3,
        'name' => 'Bohicon',
        'address' => 'Quartier Toyi',
    ]);
    
}
    }

