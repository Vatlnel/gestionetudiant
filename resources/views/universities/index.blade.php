@extends('layout')

@section('content')
<h2>Liste des universités</h2>
<a href="{{ route('universities.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter une université
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($universities as $university)
        <tr>
            <td>{{ $university->name }}</td>
            <td>{{ $university->address }}</td>
            <td>
                <a href="{{ route('universities.edit', $university) }}" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('universities.destroy', $university) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette université ?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection