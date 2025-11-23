@extends('layout')

@section('content')
<h2>Modifier la filière</h2>

<form action="{{ route('filieres.update', $filiere) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $filiere->name) }}">
    </div>

    <div class="mb-3">
        <label>Code</label>
        <input type="text" name="code" class="form-control" value="{{ old('code', $filiere->code) }}">
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('filieres.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection