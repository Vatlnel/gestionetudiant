<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Filiere;
use App\Models\University;
use App\Models\Site;

class DashboardController extends Controller
{
    public function index()
{
    try {
        return view('dashboard', [
            'studentCount' => \App\Models\Student::count(),
            'filiereCount' => \App\Models\Filiere::count(),
            'universityCount' => \App\Models\University::count(),
            'siteCount' => \App\Models\Site::count(),
        ]);
    } catch (\Exception $e) {
        return response("Erreur dans DashboardController : " . $e->getMessage(), 500);
    }
}
}