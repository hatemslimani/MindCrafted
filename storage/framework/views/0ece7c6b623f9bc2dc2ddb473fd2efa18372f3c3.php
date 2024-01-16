

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="admin-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="admin-title">
                    <i class="fas fa-users mr-2"></i>Gestion des Utilisateurs
                </h1>
                <p class="text-muted mb-0">
                    <i class="fas fa-info-circle mr-1"></i>
                    <?php echo e($data->total()); ?> utilisateurs au total
                </p>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus-circle mr-2"></i>Ajouter un utilisateur
                </button>
            </div>
        </div>
    </div>

    <div class="card user-card">
        <div class="card-body">
            <form id="searchForm" method="GET" action="<?php echo e(url('admin/controluser')); ?>">
                <div class="user-filters mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <div class="search-box">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text"
                                    name="search"
                                    class="form-control search-input"
                                    placeholder="Rechercher un utilisateur..."
                                    value="<?php echo e(request('search')); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="role" class="form-control">
                                <option value="">Tous les rôles</option>
                                <option value="pending" <?php echo e(request('role') == 'pending' ? 'selected' : ''); ?>>En attente</option>
                                <option value="1" <?php echo e(request('role') == '1' ? 'selected' : ''); ?>>Administrateur</option>
                                <option value="2" <?php echo e(request('role') == '2' ? 'selected' : ''); ?>>Enseignant</option>
                                <option value="3" <?php echo e(request('role') == '3' ? 'selected' : ''); ?>>Étudiant</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter mr-2"></i>Filtrer
                            </button>
                            <a href="<?php echo e(url('admin/controluser')); ?>" class="btn btn-secondary ml-2">
                                <i class="fas fa-undo mr-2"></i>Réinitialiser
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar"><?php echo e(strtoupper(substr($user->name, 0, 2))); ?></div>
                                    <div class="user-name"><?php echo e($user->name); ?></div>
                                </div>
                            </td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php if($user->category === null || $user->category === 0): ?>
                                <span class="role-badge role-pending">En attente</span>
                                <?php else: ?>
                                <span class="role-badge role-<?php echo e($user->category); ?>">
                                    <?php echo e($user->category == 1 ? 'Admin' : ($user->category == 2 ? 'Enseignant' : 'Étudiant')); ?>

                                </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($user->category === null || $user->category === 0): ?>
                                <span class="status-badge status-pending">En attente</span>
                                <?php else: ?>
                                <span class="status-badge status-active">Actif</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-icon btn-edit"
                                        onclick="openEditModal('<?php echo e($user->id); ?>', '<?php echo e($user->name); ?>', '<?php echo e($user->email); ?>', '<?php echo e($user->category); ?>')"
                                        title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-delete"
                                        onclick="showDeleteConfirmation('<?php echo e($user->id); ?>', '<?php echo e($user->name); ?>')"
                                        title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>



                <div class="d-flex justify-content-center mt-4">
                    <?php echo e($data->appends(request()->query())->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Un seul modal de modification -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editUserForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" id="editName" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="editEmail" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Rôle</label>
                        <select name="category" id="editCategory" class="form-control" required>
                            <option value="1">Administrateur</option>
                            <option value="2">Enseignant</option>
                            <option value="3">Étudiant</option>
                        </select>
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



<script>

    function openEditModal(userId, name, email, category) {
        document.getElementById('editUserForm').action = `<?php echo e(url('admin/updateGat')); ?>/${userId}`;
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        document.getElementById('editCategory').value = category || '';
        $('#editUserModal').modal('show');
    }

    function showDeleteConfirmation(userId, userName) {
        document.getElementById('confirmDeleteButton').href = "<?php echo e(url('admin/deleteuser')); ?>/" + userId;
        document.getElementById('deleteUserName').textContent = userName;
        $('#deleteConfirmModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    // Soumission automatique du formulaire lors de la sélection d'un rôle
    document.querySelector('select[name="role"]').addEventListener('change', function() {
        this.form.submit();
    });

    // Soumission du formulaire après un délai lors de la saisie dans la recherche
    let searchTimeout;
    document.querySelector('input[name="search"]').addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            this.form.submit();
        }, 500);
    });

    // Gestion de la soumission du formulaire d'édition
    document.getElementById('editUserForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Créer un objet FormData
        const formData = new FormData(this);

        // Envoyer la requête avec fetch
        fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Fermer le modal
                    $('#editUserModal').modal('hide');

                    // Recharger la page ou mettre à jour l'interface
                    window.location.reload();
                } else {
                    alert('Une erreur est survenue');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Une erreur est survenue');
            });
    });

    // Ajouter un événement pour le bouton de suppression
    document.getElementById('confirmDeleteButton').addEventListener('click', function(e) {
        // Désactiver le bouton et montrer un état de chargement
        this.classList.add('disabled');
        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Suppression en cours...';
    });
</script>

<style>
    .user-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .search-box {
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #718096;
    }

    .search-input {
        padding-left: 35px;
    }

    .user-table {
        margin: 0;
    }

    .user-table th {
        border-top: none;
        color: #4a5568;
        font-weight: 600;
        padding: 1rem;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-avatar {
        width: 35px;
        height: 35px;
        background: #4299e1;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 10px;
    }

    .role-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .role-1 {
        background: #ebf8ff;
        color: #2b6cb0;
    }

    .role-2 {
        background: #faf5ff;
        color: #6b46c1;
    }

    .role-3 {
        background: #f0fff4;
        color: #2f855a;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .status-active {
        background: #f0fff4;
        color: #2f855a;
    }

    .action-buttons {
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
    }

    .btn-edit {
        background: #ebf8ff;
        color: #2b6cb0;
    }

    .btn-delete {
        background: #fff5f5;
        color: #c53030;
    }

    .btn-edit:hover {
        background: #2b6cb0;
        color: white;
    }

    .btn-delete:hover {
        background: #c53030;
        color: white;
    }

    .modal-content {
        border: none;
        border-radius: 15px;
    }

    .modal-header {
        border-bottom: 1px solid #e2e8f0;
        padding: 1.5rem;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal-footer {
        border-top: 1px solid #e2e8f0;
        padding: 1.5rem;
    }

    .role-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .modal-body .form-group {
        margin-bottom: 1rem;
    }

    .modal-body input[readonly] {
        background-color: #f8f9fa;
        cursor: not-allowed;
    }

    .modal-body label {
        font-weight: 500;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }

    .modal-body select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        background-color: white;
    }

    .modal-body select:focus {
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        outline: none;
    }

    .modal-dialog-centered {
        display: flex;
        align-items: center;
        min-height: calc(100% - 3.5rem);
    }

    .modal-content {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .modal-header.bg-danger {
        background: linear-gradient(135deg, #f56565 0%, #c53030 100%);
        border-radius: 15px 15px 0 0;
    }

    .modal-header .close {
        text-shadow: none;
        opacity: 0.8;
    }

    .modal-header .close:hover {
        opacity: 1;
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-body p {
        font-size: 1.1rem;
        color: #2d3748;
    }

    .modal-body .text-muted {
        font-size: 0.9rem;
    }

    .modal-footer {
        padding: 1rem 2rem;
        border-top: 1px solid #e2e8f0;
    }

    .btn-danger {
        background: linear-gradient(135deg, #f56565 0%, #c53030 100%);
        border: none;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #c53030 0%, #9b2c2c 100%);
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: #edf2f7;
        color: #4a5568;
        border: none;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
    }

    .btn-secondary:hover {
        background: #e2e8f0;
        color: #2d3748;
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

    .modal-header.bg-danger {
        background: linear-gradient(135deg, #FC8181 0%, #C53030 100%);
    }

    .modal-footer.bg-light {
        background: #F7FAFC;
    }

    .btn-outline-secondary {
        color: #4A5568;
        border-color: #CBD5E0;
    }

    .btn-outline-secondary:hover {
        background-color: #EDF2F7;
        color: #2D3748;
        border-color: #CBD5E0;
    }

    .btn-danger {
        background: linear-gradient(135deg, #FC8181 0%, #C53030 100%);
        border: none;
        box-shadow: 0 4px 6px rgba(197, 48, 48, 0.1);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #C53030 0%, #9B2C2C 100%);
        transform: translateY(-1px);
    }

    @keyframes  pulseDelete {
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
</style>

<!-- Ajout de Font Awesome pour les icônes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Modal Ajout Utilisateur -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/adduser')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Rôle</label>
                        <select name="category" class="form-control" required>
                            <option value="1">Administrateur</option>
                            <option value="2">Enseignant</option>
                            <option value="3">Étudiant</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteConfirmModal" tabindex="-1">
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
                        <i class="fas fa-user-times"></i>
                    </div>
                    <div class="delete-info">
                        <h4 id="deleteUserName"></h4>
                        <p class="text-danger">Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                        <p class="text-muted small">
                            <i class="fas fa-info-circle mr-1"></i>
                            Cette action est irréversible et supprimera toutes les données associées à cet utilisateur.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Annuler
                </button>
                <a href="#" id="confirmDeleteButton" class="btn btn-danger">
                    <i class="fas fa-trash-alt mr-2"></i>Supprimer définitivement
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/admin/controlUser.blade.php ENDPATH**/ ?>