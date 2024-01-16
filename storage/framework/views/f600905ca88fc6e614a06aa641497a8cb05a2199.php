

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="admin-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="admin-title">Tableau de bord administrateur</h1>
            </div>
            <div class="col-md-6 text-right">
                <div class="date"><?php echo e(now()->format('l, d F Y')); ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">👥</div>
                    <h5>Total Étudiants</h5>
                    <div class="stat-number"><?php echo e($totalStudents ?? '0'); ?></div>
                    <div class="stat-trend positive">+5% cette semaine</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">👨‍🏫</div>
                    <h5>Total Enseignants</h5>
                    <div class="stat-number"><?php echo e($totalTeachers ?? '0'); ?></div>
                    <div class="stat-trend positive">+2% cette semaine</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">📚</div>
                    <h5>Total Cours</h5>
                    <div class="stat-number"><?php echo e($totalCourses ?? '0'); ?></div>
                    <div class="stat-trend positive">+8% cette semaine</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">📝</div>
                    <h5>Total Tests</h5>
                    <div class="stat-number"><?php echo e($totalTests ?? '0'); ?></div>
                    <div class="stat-trend positive">+3% cette semaine</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="admin-card">
                <h3 class="admin-card-title">Activités récentes</h3>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">📝</div>
                        <div class="activity-details">
                            <div class="activity-text">Nouveau cours ajouté : HTML Basics</div>
                            <div class="activity-time">Il y a 2 heures</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">👤</div>
                        <div class="activity-details">
                            <div class="activity-text">Nouvel étudiant inscrit</div>
                            <div class="activity-time">Il y a 3 heures</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="admin-card">
                <h3 class="admin-card-title">Actions rapides</h3>
                <div class="quick-actions">
                    <a href="#" class="btn btn-primary btn-block mb-2">Ajouter un utilisateur</a>
                    <a href="#" class="btn btn-outline-primary btn-block">Gérer les cours</a>
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
    margin: 0;
}

.date {
    color: #718096;
    font-size: 1.1rem;
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

.stat-trend {
    font-size: 0.9rem;
    color: #48bb78;
}

.stat-trend.positive:before {
    content: "↑";
    margin-right: 0.25rem;
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
    margin: -0.5rem 0;
}

.activity-item {
    display: flex;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #e2e8f0;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    font-size: 1.5rem;
    margin-right: 1rem;
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
    padding: 1rem 0;
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/admin/adminDashbord.blade.php ENDPATH**/ ?>