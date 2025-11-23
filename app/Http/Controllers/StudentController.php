<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Annee;
use App\Models\University;
use App\Models\Filiere;
use App\Models\Student;
use Carbon\Carbon;


class StudentController extends Controller
{
    // Liste des étudiants
    public function index()
    {
        $students = Student::with(['university', 'site', 'filiere'])->latest()->get();
        return view('students.index', compact('students'));
    }

    // Formulaire de création
public function create()
{
    $sites = Site::all();
    $annees = Annee::all();
    return view('students.create', compact('sites', 'annees'));
}

    // Enregistrement d’un nouvel étudiant
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'university_id' => 'required|exists:universities,id',
            'site_id'       => 'required|exists:sites,id',
            'filiere_id'    => 'required|exists:filieres,id',
            'annee_id' => 'required|exists:annees,id',

        ]);

        // Vérifier l'âge minimum
        $dob = new Carbon($validated['date_of_birth']);
        if ($dob->age < 15) {
            return back()->withErrors(['date_of_birth' => 'L’étudiant doit avoir au moins 15 ans.'])->withInput();
        }

        // Générer automatiquement le matricule
        $university = University::findOrFail($validated['university_id']);
        $prefix = strtoupper(substr($university->name, 0, 2)); // 2 premières lettres
        $randomDigits = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT); // 8 chiffres
        $matricule = $prefix . $randomDigits;

        $validated['matricule'] = $matricule;

        // Créer l’étudiant
        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Étudiant ajouté avec succès.');
    }

    // Formulaire d’édition
  

public function edit(Student $student)
{
    $universities = University::all();
    $sites = Site::all();
    $filieres = Filiere::all();
    $annees = Annee::all(); // ✅ ajout

    return view('students.edit', compact('student', 'universities', 'sites', 'filieres', 'annees'));
}

    // Mise à jour d’un étudiant
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|unique:students,email,' . $student->id,
            'date_of_birth' => 'required|date',
            'university_id' => 'required|exists:universities,id',
            'site_id'       => 'required|exists:sites,id',
            'filiere_id'    => 'required|exists:filieres,id',
            'annee_id'    => 'required|exists:annees,id',

        ]);

        // Vérifier l'âge minimum
        $dob = new Carbon($validated['date_of_birth']);
        if ($dob->age < 15) {
            return back()->withErrors(['date_of_birth' => 'L’étudiant doit avoir au moins 15 ans.'])->withInput();
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Étudiant mis à jour.');
    }

    // Suppression d’un étudiant
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Étudiant supprimé.');
    }
}