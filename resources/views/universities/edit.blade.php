@extends('layout')

@section('content')
<h2>Modifier l’université</h2>

<form action="{{ route('universities.update', $university) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $university->name) }}">
    </div>

    <div class="mb-3">
        <label>Adresse</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $university->address) }}">
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('universities.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection