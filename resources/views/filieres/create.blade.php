@extends('layout')

@section('content')
<h2>Ajouter une filière</h2>

<form action="{{ route('filieres.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label>Code</label>
        <input type="text" name="code" class="form-control" value="{{ old('code') }}">
    </div>

    <div class="mb-3">
        <label>Université</label>
        <select name="university_id" class="form-select">
            <option value="">-- Choisir --</option>
            @foreach($universities as $university)
                <option value="{{ $university->id }}">{{ $university->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Site</label>
        <select name="site_id" class="form-select">
            <option value="">-- Choisir --</option>
            @foreach($sites as $site)
                <option value="{{ $site->id }}">{{ $site->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('filieres.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection