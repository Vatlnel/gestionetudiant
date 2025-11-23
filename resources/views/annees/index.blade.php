@extends('layout')

@section('content')
<h2>Liste des années</h2>
<a href="{{ route('annees.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter une année
</a>

<table class="table table-bordered table-striped align-middle">
    <thead>
        <tr>
            <th>Nom de l'année</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($annees as $annee)
        <tr>
            <td>{{ $annee->name }}</td>
            <td class="text-center">
                {{-- Bouton Modifier --}}
                <a href="{{ route('annees.edit', $annee) }}" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>

                {{-- Bouton Supprimer avec modal --}}
                <button 
                    type="button" 
                    class="btn btn-sm btn-danger"
                    data-bs-toggle="modal" 
                    data-bs-target="#confirmDeleteModal"
                    data-annee-name="{{ $annee->name }}"
                    data-action="{{ route('annees.destroy', $annee) }}"
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
          Voulez-vous vraiment supprimer l’année <strong id="anneeNameLabel"></strong> ?
        </p>
        <p class="text-muted small">Cette action est irréversible.</p>
      </div>
      <div class="modal-footer border-0 justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form id="deleteAnneeForm" method="POST" class="d-inline">
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
  const anneeNameLabel = document.getElementById('anneeNameLabel');
  const deleteForm = document.getElementById('deleteAnneeForm');

  confirmModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const anneeName = button.getAttribute('data-annee-name');
    const action = button.getAttribute('data-action');

    anneeNameLabel.textContent = anneeName;
    deleteForm.setAttribute('action', action);
  });
});
</script>
@endpush