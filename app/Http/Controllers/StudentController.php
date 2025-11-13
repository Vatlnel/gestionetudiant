<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Filiere;
use App\Models\Site;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Liste des étudiants
    public function index()
    {
        $students = Student::with('filiere')->latest()->get();
        return view('students.index', compact('students'));
    }

    // Formulaire de création
    public function create()
    {
        $filieres = Filiere::all();
        return view('students.create', compact('filieres'));
    }

    // Enregistrement d’un nouvel étudiant
    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'email' => 'required|email|unique:students,email',
        'matricule' => 'required|unique:students,matricule',
        'date_of_birth' => 'required|date',
        'filiere_id' => 'required|exists:filieres,id',
        'site_id' => 'nullable|exists:sites,id', // si tu l’utilises
    ]);

    Student::create($validated);

    return redirect()->route('students.index')->with('success', 'Étudiant ajouté avec succès.');
}
    // Formulaire d’édition
    public function edit(Student $student)
    {
        $filieres = Filiere::all();
        $sites = Site::all();
        return view('students.edit', compact('student', 'filieres', 'sites'));
    }

    // Mise à jour d’un étudiant
    public function update(Request $request, Student $student)
    {
      $validated = $request->validate([
    'first_name' => 'required|string|max:50',
    'last_name' => 'required|string|max:50',
   'email' => 'required|email|unique:students,email,' . $student->id,
    'matricule' => 'required|unique:students,matricule,' . $student->id,
    'date_of_birth' => 'required|date',
    'filiere_id' => 'required|exists:filieres,id',
    'site_id' => 'required|exists:sites,id',
]);
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