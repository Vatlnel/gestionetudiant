<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Filiere;
use App\Models\University;
use App\Models\Site;
use App\Models\Annee;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord
     */
    public function index()
    {
        // Compteurs
        $studentCount    = Student::count();
        $filiereCount    = Filiere::count();
        $universityCount = University::count();
        $siteCount       = Site::count();
        $anneeCount      = Annee::count();

        // Envoi des données à la vue
        return view('dashboard', compact(
            'studentCount',
            'filiereCount',
            'universityCount',
            'siteCount',
            'anneeCount'
        ));
    }
}