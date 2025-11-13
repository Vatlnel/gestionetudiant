@extends('layout')

@section('content')
<h2>Ajouter un site</h2>

<form action="{{ route('sites.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label>Localisation</label>
        <input type="text" name="address" class="form-control" value="{{ old('address' , $site->address ?? '') }}">
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

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('sites.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection