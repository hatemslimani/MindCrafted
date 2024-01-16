

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="admin-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="admin-title">
                    <i class="fas fa-info-circle mr-2"></i>Informations du groupe
                </h1>
                <p class="text-muted mb-0">
                    <i class="fas fa-layer-group mr-1"></i>
                    <?php echo e($grpInfo->name); ?>

                </p>
            </div>
            <div class="col-md-6 text-right">
                <a href="<?php echo e(url('admin/controlGroup')); ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>Retour
                </a>
            </div>
        </div>
    </div>

    <?php if(session('succ')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i><?php echo e(session('succ')); ?>

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Liste des étudiants -->
        <div class="col-md-6 mb-4">
            <div class="info-card">
                <div class="info-card-header">
                    <h3><i class="fas fa-users mr-2"></i>Étudiants</h3>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addStudentModal">
                        <i class="fas fa-user-plus"></i>
                    </button>
                </div>
                <div class="info-card-body">
                    <div class="student-list">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="student-item">
                            <div class="student-info">
                                <div class="student-avatar"><?php echo e(strtoupper(substr($user->name, 0, 2))); ?></div>
                                <div class="student-details">
                                    <div class="student-name"><?php echo e($user->name); ?></div>
                                    <div class="student-email"><?php echo e($user->email); ?></div>
                                </div>
                            </div>
                            <button class="btn btn-icon btn-danger" onclick="showDeleteStudentConfirmation('<?php echo e($user->id); ?>', '<?php echo e($user->name); ?>')" title="Retirer">
                                <i class="fas fa-user-minus"></i>
                            </button>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des sections -->
        <div class="col-md-6 mb-4">
            <div class="info-card">
                <div class="info-card-header">
                    <h3><i class="fas fa-book mr-2"></i>Sections</h3>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSectionModal">
                        <i class="fas fa-plus-circle mr-2"></i>Ajouter une section
                    </button>
                </div>
                <div class="info-card-body">
                    <div class="section-list">
                        <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="section-item">
                            <div class="section-info">
                                <h4 class="section-name"><?php echo e($sec->namesection); ?></h4>
                                <div class="section-teacher">
                                    <i class="fas fa-chalkboard-teacher mr-1"></i><?php echo e($sec->name); ?>

                                </div>
                                <p class="section-description"><?php echo e($sec->description); ?></p>
                            </div>
                            <button class="btn btn-icon btn-danger" onclick="showDeleteSectionConfirmation('<?php echo e($sec->id); ?>', '<?php echo e($sec->namesection); ?>')" title="Supprimer">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Section -->
<div class="modal fade" id="addSectionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une section</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/infoGroup/addteacher/'.$grpInfo->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom de la section</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="objectif" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Enseignant</label>
                        <select name="teacher" class="form-control" required>
                            <option value="">Sélectionner un enseignant</option>
                            <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($teach->id); ?>"><?php echo e($teach->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<!-- Modal Ajout Étudiant -->
<div class="modal fade" id="addStudentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un étudiant</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/infoGroup/affecterEtucdiant/'.$grpInfo->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Étudiant</label>
                        <select name="notAff" class="form-control select2" required>
                            <option value="">Sélectionner un étudiant</option>
                            <?php $__currentLoopData = $notAffect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($etd->id); ?>"><?php echo e($etd->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<!-- Modal de confirmation de suppression d'étudiant -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Confirmation de retrait
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="delete-confirm-content">
                    <div class="delete-icon">
                        <i class="fas fa-user-minus"></i>
                    </div>
                    <div class="delete-info">
                        <h4 id="deleteStudentName"></h4>
                        <p class="text-danger">Êtes-vous sûr de vouloir retirer cet étudiant du groupe ?</p>
                        <p class="text-muted small">
                            <i class="fas fa-info-circle mr-1"></i>
                            L'étudiant sera retiré du groupe mais son compte restera actif.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Annuler
                </button>
                <a href="#" id="confirmDeleteStudentButton" class="btn btn-danger">
                    <i class="fas fa-user-minus mr-2"></i>Retirer l'étudiant
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression de section -->
<div class="modal fade" id="deleteSectionModal" tabindex="-1">
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
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="delete-info">
                        <h4 id="deleteSectionName"></h4>
                        <p class="text-danger">Êtes-vous sûr de vouloir supprimer cette section ?</p>
                        <p class="text-muted small">
                            <i class="fas fa-info-circle mr-1"></i>
                            Cette action est irréversible et supprimera :
                        </p>
                        <ul class="text-muted small text-left">
                            <li>Tous les cours de la section</li>
                            <li>Tous les examens et tests</li>
                            <li>Toutes les données associées</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Annuler
                </button>
                <a href="#" id="confirmDeleteSectionButton" class="btn btn-danger">
                    <i class="fas fa-trash-alt mr-2"></i>Supprimer définitivement
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.info-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    margin-bottom: 1.5rem;
}

.info-card-header {
    padding: 1.5rem;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.info-card-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
}

.info-card-body {
    padding: 1.5rem;
}

.student-list, .section-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.student-item, .section-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.student-item:hover, .section-item:hover {
    transform: translateX(5px);
    background: #ebf4ff;
}

.student-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.student-avatar {
    width: 40px;
    height: 40px;
    background: #4299e1;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.student-details {
    display: flex;
    flex-direction: column;
}

.student-name {
    font-weight: 600;
    color: #2d3748;
}

.student-email {
    font-size: 0.875rem;
    color: #718096;
}

.section-info {
    flex: 1;
}

.section-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.section-teacher {
    font-size: 0.875rem;
    color: #718096;
    margin-bottom: 0.5rem;
}

.section-description {
    font-size: 0.875rem;
    color: #4a5568;
    margin: 0;
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

.btn-icon.btn-danger {
    background: #fff5f5;
    color: #e53e3e;
    border: none;
}

.btn-icon.btn-danger:hover {
    background: #e53e3e;
    color: white;
}

.select2-container {
    width: 100% !important;
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

.btn-outline-secondary {
    color: #4a5568;
    border: 2px solid #cbd5e0;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    border-radius: 10px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-outline-secondary:hover {
    background-color: #f7fafc;
    color: #2d3748;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
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

    .btn-primary, .btn-outline-secondary {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
}

/* Styles pour les modals de suppression */
.delete-confirm-content {
    text-align: center;
    padding: 1.5rem;
}

.delete-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #FED7D7 0%, #FEB2B2 100%);
    color: #C53030;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    margin: 0 auto 1.5rem;
    animation: pulseDelete 2s infinite;
    box-shadow: 0 4px 10px rgba(197, 48, 48, 0.2);
}

.delete-info h4 {
    color: #2D3748;
    margin-bottom: 1rem;
    font-weight: 600;
    font-size: 1.25rem;
}

.delete-info .text-danger {
    color: #C53030 !important;
    font-weight: 500;
    font-size: 1.1rem;
    margin-bottom: 1rem;
}

.delete-info .text-muted {
    color: #718096 !important;
    font-size: 0.95rem;
}

.delete-info ul {
    list-style: none;
    padding: 0;
    margin: 1rem 0;
}

.delete-info ul li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.5rem;
    color: #718096;
}

.delete-info ul li:before {
    content: "•";
    color: #C53030;
    position: absolute;
    left: 0.5rem;
    font-weight: bold;
}

.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

#deleteStudentModal .modal-header.bg-danger {
    background: linear-gradient(135deg, #FC8181 0%, #C53030 100%) !important;
    border-bottom: none;
    padding: 1.5rem;
}

#deleteSectionModal .modal-header .modal-title {
    color: white;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

#deleteSectionModal .modal-header .close {
    color: white;
    opacity: 0.8;
    text-shadow: none;
    transition: all 0.3s ease;
}

.modal-header .close:hover {
    opacity: 1;
    transform: rotate(90deg);
}

.modal-body {
    padding: 2rem;
}

.modal-footer {
    background: #F7FAFC;
    border-top: 1px solid #EDF2F7;
    padding: 1rem 2rem;
}

.btn-outline-secondary {
    color: #4A5568;
    border: 2px solid #CBD5E0;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    background: #EDF2F7;
    color: #2D3748;
    border-color: #CBD5E0;
}

.modal .btn-danger {
    background: linear-gradient(135deg, #FC8181 0%, #C53030 100%);
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    box-shadow: 0 4px 6px rgba(197, 48, 48, 0.2);
}

.modal .btn-danger:hover {
    background: linear-gradient(135deg, #C53030 0%, #9B2C2C 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 8px rgba(197, 48, 48, 0.3);
}

.modal .btn-danger.disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

@keyframes  pulseDelete {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(197, 48, 48, 0.4);
    }
    70% {
        transform: scale(1.05);
        box-shadow: 0 0 0 15px rgba(197, 48, 48, 0);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(197, 48, 48, 0);
    }
}

/* Animation d'entrée pour les modals */
.modal.fade .modal-dialog {
    transform: scale(0.8);
    opacity: 0;
    transition: all 0.3s ease;
}

.modal.show .modal-dialog {
    transform: scale(1);
    opacity: 1;
}
</style>

<script>
function showDeleteStudentConfirmation(id, name) {
    document.getElementById('confirmDeleteStudentButton').href = "<?php echo e(url('admin/infoGroup/delete_studiant_from_group')); ?>/" + id;
    document.getElementById('deleteStudentName').textContent = name;
    $('#deleteStudentModal').modal({
        backdrop: 'static',
        keyboard: false
    });
}

function showDeleteSectionConfirmation(id, name) {
    document.getElementById('confirmDeleteSectionButton').href = "<?php echo e(url('admin/infoGroup/delete_section_from_group')); ?>/" + id;
    document.getElementById('deleteSectionName').textContent = name;
    $('#deleteSectionModal').modal({
        backdrop: 'static',
        keyboard: false
    });
}

// Ajouter les événements pour les boutons de suppression
document.getElementById('confirmDeleteStudentButton').addEventListener('click', function(e) {
    this.classList.add('disabled');
    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Suppression en cours...';
});

document.getElementById('confirmDeleteSectionButton').addEventListener('click', function(e) {
    this.classList.add('disabled');
    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Suppression en cours...';
});

$(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Sélectionner un étudiant',
        allowClear: true
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/admin/groupinformation.blade.php ENDPATH**/ ?>