

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="student-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="student-title">
                    <i class="fas fa-book-reader mr-2"></i>Mes Sections
                </h1>
            </div>
            <div class="col-md-6 text-right">
                <div class="date"><?php echo e(now()->format('l, d F Y')); ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 mb-3">
            <div class="section-card">
                <div class="section-card-header">
                    <div class="section-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3 class="section-name"><?php echo e($sec->namesection); ?></h3>
                    <div class="section-teacher">
                        <i class="fas fa-chalkboard-teacher mr-1"></i>
                        <?php echo e($sec->name); ?>

                    </div>
                </div>
                <div class="section-card-body">
                    <p class="section-description"><?php echo e($sec->description); ?></p>
                    <div class="section-stats">
                        <div class="stat-item">
                            <i class="fas fa-book-open"></i>
                            <span><?php echo e($sec->courses_count ?? 0); ?> Cours</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-users"></i>
                            <span><?php echo e($sec->students_count ?? 0); ?> Étudiants</span>
                        </div>
                    </div>
                    <a href="<?php echo e(url('home/mesCours/'.$sec->id)); ?>" class="btn btn-primary btn-block mt-2">
                        <i class="fas fa-arrow-right mr-2"></i>Accéder
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="empty-state">
                <div class="empty-state-icon">📚</div>
                <h3>Aucune section disponible</h3>
                <p>Vous n'avez pas encore de sections assignées.</p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
.section-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
    height: 100%;
}

.section-card:hover {
    transform: translateY(-5px);
}

.section-card-header {
    padding: 1rem;
    text-align: center;
    border-bottom: 1px solid #e2e8f0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px 12px 0 0;
    color: white;
}

.section-icon {
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

.section-name {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.section-teacher {
    font-size: 0.8rem;
    opacity: 0.9;
}

.section-card-body {
    padding: 1rem;
}

.section-description {
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

.section-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 0.75rem;
    padding: 0.5rem;
    background: #f7fafc;
    border-radius: 8px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #4a5568;
    font-size: 0.8rem;
}

.stat-item i {
    color: #4299e1;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    transform: translateY(-1px);
}

.empty-state {
    text-align: center;
    padding: 2rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.empty-state-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.empty-state h3 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #718096;
    margin-bottom: 0;
}

.student-header {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.student-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3748;
    margin: 0;
}

.date {
    color: #718096;
    font-size: 0.9rem;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/user/sections.blade.php ENDPATH**/ ?>