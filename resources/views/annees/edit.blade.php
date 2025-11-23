@extends('layout')

@section('content')
<h2>Modifier une année</h2>

<form action="{{ route('annees.update', $annee) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nom de l'année</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $annee->name) }}">
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('annees.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection