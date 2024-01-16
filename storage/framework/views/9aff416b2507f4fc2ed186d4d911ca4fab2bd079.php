

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="student-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="student-title">
                    <i class="fas fa-graduation-cap mr-2"></i>Tableau de bord étudiant
                </h1>
                <p class="text-muted mb-0">Bienvenue, <?php echo e(Auth::user()->name); ?></p>
            </div>
            <div class="col-md-6 text-right">
                <div class="date"><?php echo e(now()->format('l, d F Y')); ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Statistiques -->
        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">📚</div>
                    <h5>Mes Cours</h5>
                    <div class="stat-number"><?php echo e($totalCourses ?? '0'); ?></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">📝</div>
                    <h5>Tests Complétés</h5>
                    <div class="stat-number"><?php echo e($completedTests ?? '0'); ?></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">🎯</div>
                    <h5>Moyenne Générale</h5>
                    <div class="stat-number"><?php echo e($averageScore ?? '0'); ?>%</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Cours récents -->
        <div class="col-md-8 mb-4">
            <div class="student-card">
                <h3 class="student-card-title">
                    <i class="fas fa-book-reader mr-2"></i>Cours récents
                </h3>
                <div class="course-list">
                    <?php $__empty_1 = true; $__currentLoopData = $recentCourses ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="course-item">
                        <div class="course-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="course-details">
                            <div class="course-name"><?php echo e($course->name); ?></div>
                            <div class="course-info">
                                <span><?php echo e($course->section); ?></span>
                            </div>
                        </div>
                        <a href="<?php echo e(url('home/mesCours/'.$course->id)); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-muted text-center py-3">
                        Aucun cours récent
                    </div>
                    <?php endif; ?>
                </div>
                <div class="text-center mt-3">
                    <a href="<?php echo e(url('home/mesCours')); ?>" class="btn btn-primary">
                        <i class="fas fa-book mr-2"></i>Voir tous mes cours
                    </a>
                </div>
            </div>
        </div>

        <!-- Tests à venir -->
        <div class="col-md-4 mb-4">
            <div class="student-card">
                <h3 class="student-card-title">
                    <i class="fas fa-tasks mr-2"></i>Tests à venir
                </h3>
                <div class="test-list">
                    <?php $__empty_1 = true; $__currentLoopData = $upcomingTests ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="test-item">
                        <div class="test-icon">
                            <i class="fas <?php echo e($test->type == 'exam' ? 'fa-file-alt' : 'fa-tasks'); ?>"></i>
                        </div>
                        <div class="test-details">
                            <div class="test-name"><?php echo e($test->name); ?></div>
                            <div class="test-date"><?php echo e(\Carbon\Carbon::parse($test->date)->format('d/m/Y')); ?></div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-muted text-center py-3">
                        Aucun test à venir
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(Auth::user()->category == 3 && isset($debug)): ?>
        <div class="card mt-4">
            <div class="card-header">Debug Info</div>
            <div class="card-body">
                <pre><?php echo e(print_r($debug, true)); ?></pre>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
.student-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.student-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.stat-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,.05);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-card-body {
    padding: 1.5rem;
    text-align: center;
}

.stat-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #4a5568;
    margin: 0.5rem 0;
}

.student-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0,0,0,.05);
    height: 100%;
}

.student-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 1.5rem;
}

.course-list, .upcoming-tests {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.course-item, .test-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    background: #f7fafc;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.course-item:hover, .test-item:hover {
    transform: translateX(5px);
    background: #ebf4ff;
}

.course-icon, .test-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-right: 1rem;
}

.course-details, .test-details {
    flex: 1;
}

.course-name, .test-name {
    font-weight: 600;
    color: #2d3748;
}

.course-info, .test-date {
    font-size: 0.875rem;
    color: #718096;
    margin-top: 0.25rem;
}

.btn-outline-primary {
    color: #4299e1;
    border-color: #4299e1;
}

.btn-outline-primary:hover {
    background-color: #4299e1;
    color: white;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/user/home.blade.php ENDPATH**/ ?>