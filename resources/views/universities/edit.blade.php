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

    <div class="mb-3">
    <label>Filières</label>
    <div class="row">
        @foreach($filieres as $filiere)
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="filieres[]" 
                           value="{{ $filiere->id }}" 
                           id="filiere{{ $filiere->id }}">
                    <label class="form-check-label" for="filiere{{ $filiere->id }}">
                        {{ $filiere->name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('universities.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection