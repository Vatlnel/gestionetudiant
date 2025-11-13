@extends('layout')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Modifier l’étudiant</h2>

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name) }}">
    </div>

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $student->last_name) }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}">
    </div>

    <div class="mb-3">
        <label>Matricule</label>
        <input type="text" name="matricule" class="form-control" value="{{ old('matricule', $student->matricule) }}">
    </div>

    <div class="mb-3">
        <label>Date de naissance</label>
        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $student->date_of_birth) }}">
    </div>

    <div class="mb-3">
        <label>Filière</label>
        <select name="filiere_id" class="form-select">
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}" @selected($student->filiere_id == $filiere->id)>
                    {{ $filiere->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label>Site</label>
    <select name="site_id" class="form-select">
        @foreach($sites as $site)
            <option value="{{ $site->id }}" @selected($student->site_id == $site->id)>
                {{ $site->name }}
            </option>
        @endforeach
    </select>
</div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection