<?php
namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Filiere;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::with('filieres')->latest()->get();
        return view('universities.index', compact('universities'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        return view('universities.create', compact('filieres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'filieres' => 'nullable|array',
            'filieres.*' => 'exists:filieres,id',
        ]);

        // Créer l'université avec uniquement name et address
        $university = University::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);

        // Attacher les filières sélectionnées
        if (!empty($validated['filieres'])) {
            $university->filieres()->attach($validated['filieres']);
        }

        return redirect()->route('universities.index')->with('success', 'Université ajoutée.');
    }

    public function edit(University $university)
    {
        $filieres = Filiere::all();
        $selected = $university->filieres()->pluck('filieres.id')->toArray();
        return view('universities.edit', compact('university', 'filieres', 'selected'));
    }

    public function update(Request $request, University $university)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'filieres' => 'nullable|array',
            'filieres.*' => 'exists:filieres,id',
        ]);

        // Mettre à jour uniquement les champs de l'université
        $university->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);

        // Synchroniser les filières sélectionnées
        $university->filieres()->sync($validated['filieres'] ?? []);

        return redirect()->route('universities.index')->with('success', 'Université mise à jour.');
    }

    public function destroy(University $university)
    {
        $university->delete();
        return redirect()->route('universities.index')->with('success', 'Université supprimée.');
    }

public function getSites(University $university)
{
    return response()->json($university->sites()->select('id','name')->get());
}

public function getFilieres(University $university)
{
    return response()->json($university->filieres);
}
}