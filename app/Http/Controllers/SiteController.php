<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\University;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    { $sites = Site::with('universities')->latest()->get();
        return view('sites.index', compact('sites'));
    }

    public function create()
    {
        $universities = University::all();
        return view('sites.create', compact('universities'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'address' => 'nullable|string|max:255',
        'universities' => 'array', // peut être vide
        'universities.*' => 'exists:universities,id',
    ]);

    $site = Site::create([
        'name' => $validated['name'],
        'address' => $validated['address'] ?? null,
    ]);

    // Attacher les universités sélectionnées
    if (!empty($validated['universities'])) {
        $site->universities()->attach($validated['universities']);
    }

    return redirect()->route('sites.index')->with('success', 'Site ajouté avec succès.');
}

public function update(Request $request, Site $site)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'address' => 'nullable|string|max:255',
        'universities' => 'array',
        'universities.*' => 'exists:universities,id',
    ]);

    $site->update([
        'name' => $validated['name'],
        'address' => $validated['address'] ?? null,
    ]);

    // Synchroniser les universités
    $site->universities()->sync($validated['universities'] ?? []);

    return redirect()->route('sites.index')->with('success', 'Site mis à jour.');
}

    public function edit(Site $site)
    {
        $universities = University::all();
        return view('sites.edit', compact('site', 'universities'));
    }

  

    public function destroy(Site $site)
    {
        $site->delete();
        return redirect()->route('sites.index')->with('success', 'Site supprimé.');
    }

    public function getFilieres(Site $site)
{
    return response()->json($site->filieres()->select('id', 'name')->get());
}

public function getUniversities(Site $site)
{
    return response()->json($site->universities);
}
}