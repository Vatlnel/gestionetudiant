<?php
namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\University;
use App\Models\Site;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    // Liste des filières
    public function index()
    {
        $filieres = Filiere::with(['university', 'site'])->latest()->get();
        return view('filieres.index', compact('filieres'));
    }

    // Formulaire de création
    public function create()
    {
        $universities = University::all();
        $sites = Site::all();
        return view('filieres.create', compact('universities', 'sites'));
    }

    // Enregistrement d’une nouvelle filière
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:20|unique:filieres',
            'university_id' => 'required|exists:universities,id',
            'site_id' => 'required|exists:sites,id',
        ]);

        Filiere::create($validated);

        return redirect()->route('filieres.index')->with('success', 'Filière ajoutée avec succès.');
    }

    // Formulaire d’édition
    public function edit(Filiere $filiere)
    {
        $universities = University::all();
        $sites = Site::all();
        return view('filieres.edit', compact('filiere', 'universities', 'sites'));
    }

    // Mise à jour d’une filière
    public function update(Request $request, Filiere $filiere)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:20|unique:filieres,code,' . $filiere->id,
            'university_id' => 'required|exists:universities,id',
            'site_id' => 'required|exists:sites,id',
        ]);

        $filiere->update($validated);

        return redirect()->route('filieres.index')->with('success', 'Filière mise à jour.');
    }

    // Suppression d’une filière
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filieres.index')->with('success', 'Filière supprimée.');
    }
}