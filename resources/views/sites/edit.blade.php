@extends('layout')

@section('content')
<h2>Modifier le site</h2>

<form action="{{ route('sites.update', $site) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $site->name) }}">
    </div>

    <div class="mb-3">
        <label>Localisation</label>
        <input type="text" name="address" class="form-control" value="{{ old('location', $site->location) }}">
    </div>

    <div class="mb-3">
        <label>Université</label>
        <select name="university_id" class="form-select">
            @foreach($universities as $university)
                <option value="{{ $university->id }}" @selected($site->university_id == $university->id)>
                    {{ $university->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('sites.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection