<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\University;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::with('university')->latest()->get();
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
            'address' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
        ]);

        Site::create($validated);

        return redirect()->route('sites.index')->with('success', 'Site ajouté.');
    }

    public function edit(Site $site)
    {
        $universities = University::all();
        return view('sites.edit', compact('site', 'universities'));
    }

    public function update(Request $request, Site $site)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
        ]);

        $site->update($validated);

        return redirect()->route('sites.index')->with('success', 'Site mis à jour.');
    }

    public function destroy(Site $site)
    {
        $site->delete();
        return redirect()->route('sites.index')->with('success', 'Site supprimé.');
    }
}