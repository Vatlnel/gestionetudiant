@extends('layout')

@section('content')
<h2>Ajouter une année</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('annees.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nom de l'année</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('annees.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection