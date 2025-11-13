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
        return view('dashboard', [
            'studentCount' => Student::count(),
            'filiereCount' => Filiere::count(),
            'universityCount' => University::count(),
            'siteCount' => Site::count(),
        ]);
    }
}