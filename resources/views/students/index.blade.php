@extends('layout')

@section('content')
<h2>Liste des étudiants</h2>
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter un étudiant
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Matricule</th>
            <th>Date de naissance</th>
            <th>Filière</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->matricule }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>{{ $student->filiere->name ?? '-' }}</td>
            <td>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet étudiant ?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection