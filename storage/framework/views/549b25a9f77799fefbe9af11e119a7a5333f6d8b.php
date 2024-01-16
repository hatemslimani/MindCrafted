

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="teacher-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="teacher-title">
                    <i class="fas fa-book-open mr-2"></i>Détails de la section
                </h1>
            </div>
            <div class="col-md-6 text-right">
                <div class="btn-group">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
                        <i class="fas fa-plus-circle mr-2"></i>Ajouter un cours
                    </button>
                    <button class="btn btn-info ml-2" data-toggle="modal" data-target="#addExamModal">
                        <i class="fas fa-file-alt mr-2"></i>Ajouter un examen
                    </button>
                    <button class="btn btn-success ml-2" data-toggle="modal" data-target="#addTestModal">
                        <i class="fas fa-tasks mr-2"></i>Ajouter un test
                    </button>
                </div>
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

    <div class="content-grid">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content-card">
            <div class="content-card-header <?php echo e($item->catg == 'course' ? 'bg-primary' : ($item->catg == 'exam' ? 'bg-info' : 'bg-success')); ?>">
                <div class="content-icon">
                    <i class="fas <?php echo e($item->catg == 'course' ? 'fa-book' : ($item->catg == 'exam' ? 'fa-file-alt' : 'fa-tasks')); ?>"></i>
                </div>
                <h3 class="content-title"><?php echo e($item->name); ?></h3>
                <span class="content-type">
                    <?php echo e($item->catg == 'course' ? 'Cours' : ($item->catg == 'exam' ? 'Examen' : 'Test')); ?>

                </span>
            </div>
            <div class="content-card-body">
                <p class="content-description"><?php echo e($item->description); ?></p>
                <div class="content-meta">
                    <span><i class="far fa-clock mr-1"></i><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?></span>
                </div>
                <div class="content-actions">
                    <?php if($item->catg == 'course'): ?>
                        <a href="<?php echo e(url('teacher/mesCours/pdf/'.$item->id)); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-file-pdf mr-1"></i>PDF
                        </a>
                    <?php elseif($item->catg == 'exam'): ?>
                        <a href="<?php echo e(url('teacher/mesCours/viewExam/'.$item->id)); ?>" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye mr-1"></i>Voir
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(url('teacher/mesCours/viewTest/'.$item->id)); ?>" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-eye mr-1"></i>Voir
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!-- Modal Ajout Cours -->
<div class="modal fade" id="addCourseModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-book mr-2"></i>Ajouter un cours</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('teacher/mesCours/addCours/'.$id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Titre du cours</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Contenu</label>
                        <textarea name="content" class="form-control" rows="10" required></textarea>
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

<!-- Modal Ajout Examen -->
<div class="modal fade" id="addExamModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-file-alt mr-2"></i>Ajouter un examen</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('teacher/mesCours/addExam/'.$id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Titre de l'examen</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Durée (minutes)</label>
                        <input type="number" name="duree" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ajout Test -->
<div class="modal fade" id="addTestModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-tasks mr-2"></i>Ajouter un test</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('teacher/mesCours/addTest/'.$id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Titre du test</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Durée (minutes)</label>
                        <input type="number" name="duree" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.content-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
    overflow: hidden;
}

.content-card:hover {
    transform: translateY(-5px);
}

.content-card-header {
    padding: 1.5rem;
    text-align: center;
    color: white;
}

.content-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.25rem;
}

.content-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.content-type {
    font-size: 0.875rem;
    opacity: 0.9;
}

.content-card-body {
    padding: 1.5rem;
}

.content-description {
    color: #4a5568;
    margin-bottom: 1rem;
    font-size: 0.875rem;
    line-height: 1.5;
}

.content-meta {
    color: #718096;
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.content-actions {
    display: flex;
    justify-content: flex-end;
}

.bg-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.bg-info { background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%); }
.bg-success { background: linear-gradient(135deg, #48bb78 0%, #38a169 100%); }

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

.alert {
    border-left: 4px solid;
}

.alert-success {
    border-left-color: #48bb78;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/teacher/info.blade.php ENDPATH**/ ?>