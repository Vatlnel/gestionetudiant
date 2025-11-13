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

    <div class="mb-3">
        <label>Université</label>
        <select name="university_id" class="form-select">
            @foreach($universities as $university)
                <option value="{{ $university->id }}" @selected($filiere->university_id == $university->id)>
                    {{ $university->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Site</label>
        <select name="site_id" class="form-select">
            @foreach($sites as $site)
                <option value="{{ $site->id }}" @selected($filiere->site_id == $site->id)>
                    {{ $site->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('filieres.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection