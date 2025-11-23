@extends('layout')

@section('content')
<h2>Liste des sites</h2>
<a href="{{ route('sites.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter un site
</a>

<table class="table table-bordered table-striped align-middle">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Universités</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sites as $site)
        <tr>
            <td>{{ $site->name }}</td>
            <td>{{ $site->address }}</td>
            <td>
                @forelse($site->universities as $university)
                    <span class="badge bg-info">{{ $university->name }}</span>
                @empty
                    <span class="text-muted">Aucune université associée</span>
                @endforelse
            </td>
            <td class="text-center">
                <a href="{{ route('sites.edit', $site) }}" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('sites.destroy', $site) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection