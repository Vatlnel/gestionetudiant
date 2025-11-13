@extends('layout')

@section('content')
<h2>Ajouter une université</h2>

<form action="{{ route('universities.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label>Adresse</label>
        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('universities.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection