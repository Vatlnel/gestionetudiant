<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
        'filiere_id' => 1,
        'first_name' => 'Jean',
        'last_name' => 'Doe',
        'email' => 'jean.doe@gmail.com',
        'matricule' => 'ETU003',
        'date_of_birth' => '2000-05-10',
    ]);

    Student::create([
        'filiere_id' => 2,
        'first_name' => 'Amina',
        'last_name' => 'Sow',
        'email' => 'amina.sow@gmail.com',
        'matricule' => 'ETU004',
        'date_of_birth' => '1999-11-22',
    ]);
 
    }
}
