

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="student-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="student-title">
                    <i class="fas fa-book-reader mr-2"></i>Contenu du cours
                </h1>
                <p class="text-muted mb-0">
                    <i class="fas fa-graduation-cap mr-1"></i>
                    <?php echo e($namesection ?? 'Section non spécifiée'); ?>

                </p>
            </div>
            <div class="col-md-6 text-right">
                <a href="<?php echo e(url('/home/mesCours')); ?>" class="btn btn-outline-secondary mr-2">
                    <i class="fas fa-arrow-left mr-2"></i>Retour
                </a>
                <a href="<?php echo e(url('home/historique/'.$id)); ?>" class="btn btn-outline-primary">
                    <i class="fas fa-history mr-2"></i>Voir l'historique
                </a>
            </div>
        </div>
    </div>

    <div class="content-grid">
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                <div class="content-actions">
                    <?php if($item->catg == 'course'): ?>
                        <a href="<?php echo e(url('home/cours/'.$item->id)); ?>" class="btn btn-primary">
                            <i class="fas fa-book-reader mr-2"></i>Voir le cours
                        </a>
                    <?php elseif($item->catg == 'exam'): ?>
                        <a href="<?php echo e(url('home/mesCours/examen/'.$item->id)); ?>" class="btn btn-info">
                            <i class="fas fa-file-alt mr-2"></i>Passer l'examen
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(url('home/mesCours/test/'.$item->id)); ?>" class="btn btn-success">
                            <i class="fas fa-tasks mr-2"></i>Passer le test
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty-state">
            <div class="empty-state-icon">📚</div>
            <h3>Aucun contenu disponible</h3>
            <p>Cette section ne contient pas encore de contenu.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
.content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1rem;
    margin-top: 1.5rem;
}

.content-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
    overflow: hidden;
}

.content-card:hover {
    transform: translateY(-5px);
}

.content-card-header {
    padding: 1rem;
    text-align: center;
    color: white;
}

.bg-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-info {
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
}

.bg-success {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
}

.content-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 0.5rem;
    font-size: 1.2rem;
}

.content-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.content-type {
    font-size: 0.8rem;
    opacity: 0.9;
}

.content-card-body {
    padding: 1rem;
}

.content-description {
    color: #4a5568;
    margin-bottom: 1rem;
    font-size: 0.875rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.content-actions {
    display: flex;
    justify-content: center;
}

.btn {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-size: 0.875rem;
}

.btn i {
    margin-right: 0.5rem;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
}

.btn-info {
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
    border: none;
    color: white;
}

.btn-success {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
    border: none;
    color: white;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.empty-state {
    text-align: center;
    padding: 3rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    grid-column: 1 / -1;
}

.empty-state-icon {
    font-size: 4rem;
    margin-bottom: 1.5rem;
}

.empty-state h3 {
    color: #2d3748;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #718096;
    margin-bottom: 0;
}

.student-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
    margin-bottom: 2rem;
}

.student-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
}

.text-muted {
    color: #718096 !important;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
}

.text-muted i {
    color: #4299e1;
    margin-right: 0.5rem;
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/user/section_details.blade.php ENDPATH**/ ?>