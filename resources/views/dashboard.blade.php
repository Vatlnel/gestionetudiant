@extends('layout')

@section('content')
<h2 class="mb-4">Tableau de bord</h2>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person-lines-fill"></i> Étudiants</h5>
                <p class="card-text fs-4">{{ $studentCount }}</p>
                <a href="{{ route('students.index') }}" class="btn btn-light btn-sm">Voir</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-diagram-3"></i> Filières</h5>
                <p class="card-text fs-4">{{ $filiereCount }}</p>
                <a href="{{ route('filieres.index') }}" class="btn btn-light btn-sm">Voir</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-building"></i> Universités</h5>
                <p class="card-text fs-4">{{ $universityCount }}</p>
                <a href="{{ route('universities.index') }}" class="btn btn-light btn-sm">Voir</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-geo-alt"></i> Sites</h5>
                <p class="card-text fs-4">{{ $siteCount }}</p>
                <a href="{{ route('sites.index') }}" class="btn btn-light btn-sm">Voir</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-calendar3"></i> Années</h5>
                <p class="card-text fs-4">{{ $anneeCount }}</p>
                <a href="{{ route('annees.index') }}" class="btn btn-light btn-sm">Voir</a>
            </div>
        </div>
    </div>
</div>
@endsection