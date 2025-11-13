<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-0">
        <div class="container-fluid">
            <span class="navbar-brand">Tableau de bord</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->

            <li class="nav-item mb-2">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="bi bi-house-door"></i> Accueil
    </a>
            </li>
            <div class="col-md-3 bg-light vh-100 p-3 border-end">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('students.index') }}">
                            <i class="bi bi-person-lines-fill"></i> Étudiants
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('filieres.index') }}">
                            <i class="bi bi-diagram-3"></i> Filières
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('universities.index') }}">
                            <i class="bi bi-building"></i> Universités
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('sites.index') }}">
                            <i class="bi bi-geo-alt"></i> Sites
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contenu principal -->
            <div class="col-md-9 p-4">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>