@extends('layout')

@section('content')
<h2>Modifier un site</h2>

<form action="{{ route('sites.update', $site) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nom du site</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $site->name) }}">
    </div>

    <div class="mb-3">
        <label>Adresse</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $site->address) }}">
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
                            {{ in_array($university->id, old('universities', $site->universities->pluck('id')->toArray())) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="university{{ $university->id }}">
                            {{ $university->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('sites.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection