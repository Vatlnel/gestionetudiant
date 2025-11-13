@extends('layout')

@section('content')
<h2>Ajouter un étudiant</h2>

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
    </div>

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label>Matricule</label>
        <input type="text" name="matricule" class="form-control" value="{{ old('matricule') }}">
    </div>

    <div class="mb-3">
        <label>Date de naissance</label>
        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
    </div>

    <div class="mb-3">
        <label>Filière</label>
        <select name="filiere_id" class="form-select">
            <option value="">-- Choisir --</option>
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}">{{ $filiere->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection