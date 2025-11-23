@extends('layout')

@section('content')
<h2>Modifier un étudiant</h2>

{{-- Affichage des erreurs --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="first_name" class="form-control"
               value="{{ old('first_name', $student->first_name) }}">
    </div>

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="last_name" class="form-control"
               value="{{ old('last_name', $student->last_name) }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email', $student->email) }}">
    </div>

    <div class="mb-3">
        <label>Date de naissance</label>
        <input type="date" name="date_of_birth" class="form-control"
               value="{{ old('date_of_birth', $student->date_of_birth) }}">
    </div>

    {{-- Matricule affiché en lecture seule --}}
    <div class="mb-3">
        <label>Matricule</label>
        <input type="text" class="form-control"
               value="{{ $student->matricule }}" disabled>
    </div>

    <div class="mb-3">
        <label>Université</label>
        <select id="university" name="university_id" class="form-select">
            <option value="">-- Choisir une université --</option>
            @foreach($universities as $university)
                <option value="{{ $university->id }}"
                    {{ old('university_id', $student->university_id) == $university->id ? 'selected' : '' }}>
                    {{ $university->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Site</label>
        <select id="site" name="site_id" class="form-select">
            <option value="">-- Choisir un site --</option>
            @foreach($sites as $site)
                <option value="{{ $site->id }}"
                    {{ old('site_id', $student->site_id) == $site->id ? 'selected' : '' }}>
                    {{ $site->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Filière</label>
        <select id="filiere" name="filiere_id" class="form-select">
            <option value="">-- Choisir une filière --</option>
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}"
                    {{ old('filiere_id', $student->filiere_id) == $filiere->id ? 'selected' : '' }}>
                    {{ $filiere->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Année</label>
        <select id="annee" name="annee_id" class="form-select">
            <option value="">-- Choisir une année --</option>
            @foreach($annees as $annee)
                <option value="{{ $annee->id }}"
                    {{ old('annee_id', $student->annee_id) == $annee->id ? 'selected' : '' }}>
                    {{ $annee->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const universitySelect = document.getElementById('university');
    const siteSelect = document.getElementById('site');
    const filiereSelect = document.getElementById('filiere');

    universitySelect.addEventListener('change', function () {
        const universityId = this.value;
        siteSelect.innerHTML = '<option value="">-- Choisir un site --</option>';
        filiereSelect.innerHTML = '<option value="">-- Choisir une filière --</option>';

        if (universityId) {
            fetch(`/universities/${universityId}/sites`)
                .then(response => response.json())
                .then(data => {
                    siteSelect.innerHTML = '<option value="">-- Choisir un site --</option>';
                    data.forEach(site => {
                        siteSelect.innerHTML += `<option value="${site.id}">${site.name}</option>`;
                    });
                });
        }
    });

    siteSelect.addEventListener('change', function () {
        const siteId = this.value;
        filiereSelect.innerHTML = '<option value="">-- Choisir une filière --</option>';

        if (siteId) {
            fetch(`/sites/${siteId}/filieres`)
                .then(response => response.json())
                .then(data => {
                    filiereSelect.innerHTML = '<option value="">-- Choisir une filière --</option>';
                    data.forEach(filiere => {
                        filiereSelect.innerHTML += `<option value="${filiere.id}">${filiere.name}</option>`;
                    });
                });
        }
    });
});
</script>
@endpush