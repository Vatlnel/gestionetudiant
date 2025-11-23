@extends('layout')

@section('content')
<h2>Liste des universités</h2>
<a href="{{ route('universities.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter une université
</a>

<table class="table table-bordered table-striped align-middle">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Filières</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($universities as $university)
        <tr>
            <td>{{ $university->name }}</td>
            <td>{{ $university->address }}</td>
            <td>
                @forelse($university->filieres as $filiere)
                    <span class="badge bg-info">{{ $filiere->name }}</span>
                @empty
                    <span class="text-muted">Aucune filière associée</span>
                @endforelse
            </td>
            <td class="text-center">
                <a href="{{ route('universities.edit', $university) }}" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <button 
                    type="button" 
                    class="btn btn-sm btn-danger"
                    data-bs-toggle="modal" 
                    data-bs-target="#confirmDeleteModal"
                    data-university-name="{{ $university->name }}"
                    data-action="{{ route('universities.destroy', $university) }}"
                >
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Modal unique réutilisable --}}
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="confirmDeleteLabel">Confirmer la suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center">
        {{-- Illustration SVG --}}
        <svg width="80" height="80" viewBox="0 0 24 24" aria-hidden="true" class="mb-3">
          <circle cx="12" cy="12" r="10" fill="#fde2e4"></circle>
          <path d="M9 9l6 6M15 9l-6 6" stroke="#c1121f" stroke-width="2" stroke-linecap="round"></path>
        </svg>

        <p class="mb-2">
          Voulez-vous vraiment supprimer l’université <strong id="universityNameLabel"></strong> ?
        </p>
        <p class="text-muted small">Cette action est irréversible.</p>
      </div>
      <div class="modal-footer border-0 justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form id="deleteUniversityForm" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const confirmModal = document.getElementById('confirmDeleteModal');
  const universityNameLabel = document.getElementById('universityNameLabel');
  const deleteForm = document.getElementById('deleteUniversityForm');

  confirmModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const universityName = button.getAttribute('data-university-name');
    const action = button.getAttribute('data-action');

    universityNameLabel.textContent = universityName;
    deleteForm.setAttribute('action', action);
  });
});
</script>
@endpush