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
</div>

<canvas id="dashboardChart" width="400" height="200"></canvas>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const dashboardChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Étudiants', 'Filières', 'Universités', 'Sites'],
            datasets: [{
                label: 'Nombre total',
                data: [{{ $studentCount }}, {{ $filiereCount }}, {{ $universityCount }}, {{ $siteCount }}],
                backgroundColor: [
                    'rgba(13, 110, 253, 0.7)',
                    'rgba(25, 135, 84, 0.7)',
                    'rgba(255, 193, 7, 0.7)',
                    'rgba(220, 53, 69, 0.7)'
                ],
                borderColor: [
                    'rgba(13, 110, 253, 1)',
                    'rgba(25, 135, 84, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(220, 53, 69, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush