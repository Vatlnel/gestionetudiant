<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    public function index()
    {
        $annees = Annee::all();
        return view('annees.index', compact('annees'));
    }

    public function create()
    {
        return view('annees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Annee::create($request->only('name'));

        return redirect()->route('annees.index')->with('success', 'Année ajoutée avec succès.');
    }

    public function edit(Annee $annee)
    {
        return view('annees.edit', compact('annee'));
    }

    public function update(Request $request, Annee $annee)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $annee->update($request->only('name'));

        return redirect()->route('annees.index')->with('success', 'Année mise à jour avec succès.');
    }

    public function destroy(Annee $annee)
    {
        $annee->delete();
        return redirect()->route('annees.index')->with('success', 'Année supprimée avec succès.');
    }
}