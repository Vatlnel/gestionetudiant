<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    {{-- Barre de navigation --}}
    <nav class="navbar navbar-dark bg-dark mb-0">
        <div class="container-fluid">
            <span class="navbar-brand">Tableau de bord</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-md-3 bg-light vh-100 p-3 border-end">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i> Accueil
                        </a>
                    </li>
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
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('annees.index') }}">
                            <i class="bi bi-geo-alt"></i> Niveaux
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contenu principal --}}
            <div class="col-md-9 p-4">
                {{-- On enlève les alerts Bootstrap, les toasts prendront le relais --}}
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Scripts JS globaux --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery + Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        }

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if(session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif

        @if(session('info'))
            toastr.info("{{ session('info') }}");
        @endif
    </script>

    {{-- ⚠️ Important : permet d’injecter les scripts des vues --}}
    @stack('scripts')
</body>
</html>