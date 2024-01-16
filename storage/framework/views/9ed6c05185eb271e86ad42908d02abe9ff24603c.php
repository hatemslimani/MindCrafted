

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="admin-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="admin-title">
                    <i class="fas fa-tachometer-alt mr-2"></i>Tableau de bord administrateur
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
        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">👨‍🎓</div>
                    <h5>Total Étudiants</h5>
                    <div class="stat-number"><?php echo e($totalStudents ?? '0'); ?></div>
                    <div class="stat-trend <?php echo e($studentsTrend > 0 ? 'positive' : ($studentsTrend < 0 ? 'negative' : 'neutral')); ?>">
                        <?php echo e(abs($studentsTrend)); ?>% <?php echo e($studentsTrend > 0 ? 'nouveaux' : ($studentsTrend < 0 ? 'de baisse' : 'stable')); ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">👨‍🏫</div>
                    <h5>Total Enseignants</h5>
                    <div class="stat-number"><?php echo e($totalTeachers ?? '0'); ?></div>
                    <div class="stat-trend <?php echo e($teachersTrend > 0 ? 'positive' : ($teachersTrend < 0 ? 'negative' : 'neutral')); ?>">
                        <?php echo e(abs($teachersTrend)); ?>% <?php echo e($teachersTrend > 0 ? 'nouveaux' : ($teachersTrend < 0 ? 'de baisse' : 'stable')); ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">👨</div>
                    <h5>Total Groupes</h5>
                    <div class="stat-number"><?php echo e($totalGroups ?? '0'); ?></div>
                    <div class="stat-trend <?php echo e($groupsTrend > 0 ? 'positive' : ($groupsTrend < 0 ? 'negative' : 'neutral')); ?>">
                        <?php echo e(abs($groupsTrend)); ?>% <?php echo e($groupsTrend > 0 ? 'nouveaux' : ($groupsTrend < 0 ? 'de baisse' : 'stable')); ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">📚</div>
                    <h5>Total Sections</h5>
                    <div class="stat-number"><?php echo e($totalSections ?? '0'); ?></div>
                    <div class="stat-trend <?php echo e($sectionsTrend > 0 ? 'positive' : ($sectionsTrend < 0 ? 'negative' : 'neutral')); ?>">
                        <?php echo e(abs($sectionsTrend)); ?>% <?php echo e($sectionsTrend > 0 ? 'nouveaux' : ($sectionsTrend < 0 ? 'de baisse' : 'stable')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Activités récentes -->
        <div class="col-md-8 mb-4">
            <div class="admin-card">
                <h3 class="admin-card-title">
                    <i class="fas fa-history mr-2"></i>Activités récentes
                </h3>
                <div class="activity-list">
                    <?php $__empty_1 = true; $__currentLoopData = $recentActivities ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas <?php echo e($activity->icon ?? 'fa-circle'); ?>"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-text"><?php echo e($activity->description ?? 'Nouvelle activité'); ?></div>
                            <div class="activity-time"><?php echo e($activity->created_at ?? 'Récemment'); ?></div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-muted text-center py-3">
                        Aucune activité récente
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="col-md-4 mb-4">
            <div class="admin-card">
                <h3 class="admin-card-title">
                    <i class="fas fa-bolt mr-2"></i>Actions rapides
                </h3>
                <div class="quick-actions">
                    <a href="<?php echo e(url('admin/controluser')); ?>" class="btn btn-primary btn-block mb-2">
                        <i class="fas fa-user-plus mr-2"></i>Gérer les utilisateurs
                    </a>
                    <a href="<?php echo e(url('admin/controlGroup')); ?>" class="btn btn-info btn-block mb-2">
                        <i class="fas fa-layer-group mr-2"></i>Gérer les groupes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.admin-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
    margin-bottom: 2rem;
}

.admin-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
}

.admin-title i {
    color: #4299e1;
    font-size: 1.4rem;
}

.text-muted {
    color: #718096 !important;
    font-size: 1rem;
}

.date {
    color: #718096;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.date:before {
    content: '\f073';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    margin-right: 0.5rem;
    color: #4299e1;
}

/* Styles pour les cartes de statistiques */
.stat-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,.05);
    transition: transform 0.3s ease;
    height: 100%;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-card-body {
    padding: 1.5rem;
    text-align: center;
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(66, 153, 225, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    color: #4299e1;
}

.stat-title {
    font-size: 1rem;
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 0.5rem;
}

.stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.stat-trend {
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.25rem;
}

.stat-trend.positive {
    color: #48bb78;
}

.stat-trend.negative {
    color: #e53e3e;
}

.stat-trend.neutral {
    color: #718096;
}

/* Animation pour les icônes */
@keyframes  pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

.stat-icon {
    animation: pulse 2s infinite;
}

.admin-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0,0,0,.05);
    height: 100%;
}

.admin-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 1.5rem;
}

.activity-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.activity-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    background: #f7fafc;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.activity-item:hover {
    background: #ebf4ff;
    transform: translateX(5px);
}

.activity-icon {
    width: 40px;
    height: 40px;
    background: #ebf4ff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    color: #4299e1;
}

.activity-details {
    flex: 1;
}

.activity-text {
    color: #4a5568;
    font-weight: 500;
}

.activity-time {
    color: #718096;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn-info {
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
    border: none;
    color: white;
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/admin/home.blade.php ENDPATH**/ ?>