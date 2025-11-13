@extends('layout')

@section('content')
<h2>Liste des filières</h2>
<a href="{{ route('filieres.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter une filière
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Code</th>
            <th>Université</th>
            <th>Site</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filieres as $filiere)
        <tr>
            <td>{{ $filiere->name }}</td>
            <td>{{ $filiere->code }}</td>
            <td>{{ $filiere->university->name ?? '-' }}</td>
            <td>{{ $filiere->site->name ?? '-' }}</td>
            <td>
                <a href="{{ route('filieres.edit', $filiere) }}" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('filieres.destroy', $filiere) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette filière ?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection