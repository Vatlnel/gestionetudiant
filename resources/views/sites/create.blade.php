@extends('layout')

@section('content')
<h2>Ajouter un site</h2>

<form action="{{ route('sites.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nom du site</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label>Adresse</label>
        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
    </div>

    <div class="mb-3">
        <label>Universités associées</label>
        <div class="row">
            @foreach($universities as $university)
                <div class="col-md-4">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="universities[]" 
                            value="{{ $university->id }}"
                            id="university{{ $university->id }}"
                            {{ in_array($university->id, old('universities', [])) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="university{{ $university->id }}">
                            {{ $university->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <small class="text-muted">Cochez une ou plusieurs universités, ou laissez vide si aucune.</small>
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('sites.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection