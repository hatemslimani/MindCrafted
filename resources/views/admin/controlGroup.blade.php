@extends('layouts.app')

@section('content')
<div class="container">
    <div class="admin-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="admin-title">
                    <i class="fas fa-layer-group mr-2"></i>Gestion des Groupes
                </h1>
                <p class="text-muted mb-0">
                    <i class="fas fa-info-circle mr-1"></i>
                    {{ count($group) }} groupes au total
                </p>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addGroupModal">
                    <i class="fas fa-plus-circle mr-2"></i>Nouveau Groupe
                </button>
            </div>
        </div>
    </div>

    @if(session('succ'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('succ') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        @foreach($group as $grp)
        <div class="col-md-4 mb-4">
            <div class="group-card">
                <div class="group-card-header">
                    <h3 class="group-name">{{ $grp->name }}</h3>
                    <div class="group-actions">
                        <button class="btn btn-icon" data-toggle="modal" data-target="#editGroup{{ $grp->id }}" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-icon" onclick="showDeleteGroupConfirmation('{{ $grp->id }}', '{{ $grp->name }}')" title="Supprimer">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="group-card-body">
                    <div class="group-stats">
                        <div class="stat-item">
                            <i class="fas fa-users"></i>
                            <span>{{ $grp->studentCount }} Étudiants</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-book"></i>
                            <span>{{ $grp->sectionCount }} Sections</span>
                        </div>
                    </div>
                    <a href="{{ url('admin/infoGroup/'.$grp->id) }}" class="btn btn-outline-primary btn-block mt-3">
                        <i class="fas fa-info-circle mr-2"></i>Détails
                    </a>
                </div>
            </div>

            <!-- Modal Modification -->
            <div class="modal fade" id="editGroup{{ $grp->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le groupe</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('admin/updateNameGroupe/'.$grp->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nom du groupe</label>
                                    <input type="text" name="namee" class="form-control" value="{{ $grp->name }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Ajout Groupe -->
<div class="modal fade" id="addGroupModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Groupe</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/addGroup') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom du groupe</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Étudiants disponibles</label>
                        <select name="studiant[]" class="form-control select2" multiple>
                            @foreach($user as $usr)
                                <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteGroupModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Confirmation de suppression
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="delete-confirm-content">
                    <div class="delete-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="delete-info">
                        <h4 id="deleteGroupName"></h4>
                        <p class="text-danger">Êtes-vous sûr de vouloir supprimer ce groupe ?</p>
                        <p class="text-muted small">
                            <i class="fas fa-info-circle mr-1"></i>
                            Cette action est irréversible et supprimera :
                        </p>
                        <ul class="text-muted small text-left">
                            <li>Toutes les sections associées</li>
                            <li>Les affectations des étudiants</li>
                            <li>Les données liées au groupe</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Annuler
                </button>
                <a href="#" id="confirmDeleteGroupButton" class="btn btn-danger">
                    <i class="fas fa-trash-alt mr-2"></i>Supprimer définitivement
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.admin-header {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    margin-bottom: 2rem;
    border: 1px solid rgba(226, 232, 240, 0.5);
    position: relative;
    overflow: hidden;
}

.admin-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #4299e1 0%, #667eea 100%);
}

.admin-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    position: relative;
}

.admin-title i {
    color: #4299e1;
    font-size: 1.6rem;
    margin-right: 0.75rem;
    transition: transform 0.3s ease;
}

.admin-header:hover .admin-title i {
    transform: scale(1.1);
}

.text-muted {
    color: #718096 !important;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    opacity: 0.8;
}

.text-muted i {
    color: #4299e1;
    margin-right: 0.5rem;
    font-size: 0.9rem;
}

.btn-primary {
    background: linear-gradient(135deg, #4299e1 0%, #667eea 100%);
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(66, 153, 225, 0.2);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(66, 153, 225, 0.3);
    background: linear-gradient(135deg, #3182ce 0%, #5a67d8 100%);
}

.btn-primary i {
    margin-right: 0.5rem;
    font-size: 1rem;
    transition: transform 0.3s ease;
}

.btn-primary:hover i {
    transform: rotate(180deg);
}

@media (max-width: 768px) {
    .admin-header {
        padding: 1.5rem;
    }

    .admin-title {
        font-size: 1.5rem;
    }

    .text-muted {
        font-size: 0.875rem;
    }

    .btn-primary {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
}

.group-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.group-card:hover {
    transform: translateY(-5px);
}

.group-card-header {
    padding: 1.5rem;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.group-name {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin: 0;
}

.group-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-icon {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: all 0.3s ease;
    background: transparent;
    border: none;
}

.btn-icon:hover {
    background: #ebf4ff;
    color: #4299e1;
}

.group-card-body {
    padding: 1.5rem;
}

.group-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #4a5568;
}

.stat-item i {
    color: #4299e1;
}

.select2-container {
    width: 100% !important;
}

.alert {
    border-left: 4px solid;
}

.alert-success {
    border-left-color: #48bb78;
}

.modal-content {
    border: none;
    border-radius: 15px;
}

.modal-header {
    background: #f8fafc;
    border-radius: 15px 15px 0 0;
}

.modal-footer {
    background: #f8fafc;
    border-radius: 0 0 15px 15px;
}

.delete-confirm-content {
    text-align: center;
    padding: 1rem;
}

.delete-icon {
    width: 80px;
    height: 80px;
    background: #FED7D7;
    color: #C53030;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    margin: 0 auto 1.5rem;
    animation: pulseDelete 2s infinite;
}

.delete-info h4 {
    color: #2D3748;
    margin-bottom: 1rem;
    font-weight: 600;
}

.delete-info ul {
    list-style-type: none;
    padding-left: 1.5rem;
    margin-top: 0.5rem;
}

.delete-info ul li {
    position: relative;
    margin-bottom: 0.5rem;
}

.delete-info ul li:before {
    content: "•";
    color: #C53030;
    position: absolute;
    left: -1rem;
}

@keyframes pulseDelete {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(197, 48, 48, 0.4);
    }
    70% {
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(197, 48, 48, 0);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(197, 48, 48, 0);
    }
}
</style>

<script>
function confirmDelete(id) {
    if(confirm('Êtes-vous sûr de vouloir supprimer ce groupe ?')) {
        window.location.href = "{{ url('admin/deleteGroup') }}/" + id;
    }
}

// Initialisation de Select2 pour une meilleure sélection multiple
$(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Sélectionnez des étudiants',
        allowClear: true
    });
});

function showDeleteGroupConfirmation(groupId, groupName) {
    // Mettre à jour le lien de suppression
    document.getElementById('confirmDeleteGroupButton').href = "{{ url('admin/deleteGroup') }}/" + groupId;
    
    // Mettre à jour le nom du groupe dans le modal
    document.getElementById('deleteGroupName').textContent = groupName;
    
    // Afficher le modal avec une animation
    $('#deleteGroupModal').modal({
        backdrop: 'static',
        keyboard: false
    });
}

// Ajouter un événement pour le bouton de suppression
document.getElementById('confirmDeleteGroupButton').addEventListener('click', function(e) {
    // Désactiver le bouton et montrer un état de chargement
    this.classList.add('disabled');
    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Suppression en cours...';
});
</script>

<!-- Inclusion de Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
    