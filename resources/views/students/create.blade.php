@extends('layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Ajouter un étudiant</h2>

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
    </div>

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label>Date de naissance</label>
        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
    </div>

    <div class="mb-3">
        <label>Site</label>
        <select id="site" name="site_id" class="form-select">
            <option value="">-- Choisir un site --</option>
            @foreach($sites as $site)
                <option value="{{ $site->id }}">{{ $site->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Université</label>
        <select id="university" name="university_id" class="form-select" disabled>
            <option value="">-- Choisir une université --</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Filière</label>
        <select id="filiere" name="filiere_id" class="form-select" disabled>
            <option value="">-- Choisir une filière --</option>
        </select>
    </div>
    <div class="mb-3">
    <label>Année</label>
    <select name="annee_id" class="form-select">
        <option value="">-- Choisir une année --</option>
        @foreach($annees as $annee)
            <option value="{{ $annee->id }}">{{ $annee->name }}</option>
        @endforeach
    </select>
</div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const siteSelect = document.getElementById('site');
    const universitySelect = document.getElementById('university');
    const filiereSelect = document.getElementById('filiere');

    // Quand on choisit un site
    siteSelect.addEventListener('change', function () {
        const siteId = this.value;

        universitySelect.innerHTML = '<option value="">-- Choisir une université --</option>';
        filiereSelect.innerHTML = '<option value="">-- Choisir une filière --</option>';
        universitySelect.disabled = true;
        filiereSelect.disabled = true;

        if (siteId) {
            fetch(`/sites/${siteId}/universities`)
                .then(res => res.json())
                .then(data => {
                    if (data.length > 0) {
                        universitySelect.disabled = false;
                        data.forEach(university => {
                            universitySelect.innerHTML += `<option value="${university.id}">${university.name}</option>`;
                        });
                    }
                });
        }
    });

    // Quand on choisit une université
    universitySelect.addEventListener('change', function () {
        const universityId = this.value;

        filiereSelect.innerHTML = '<option value="">-- Choisir une filière --</option>';
        filiereSelect.disabled = true;

        if (universityId) {
            fetch(`/universities/${universityId}/filieres`)
                .then(res => res.json())
                .then(data => {
                    if (data.length > 0) {
                        filiereSelect.disabled = false;
                        data.forEach(filiere => {
                            filiereSelect.innerHTML += `<option value="${filiere.id}">${filiere.name}</option>`;
                        });
                    }
                });
        }
    });
});
</script>
@endpush