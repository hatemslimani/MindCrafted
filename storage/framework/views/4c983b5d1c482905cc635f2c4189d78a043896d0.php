

<?php $__env->startSection('content'); ?>
<div class="pending-container">
    <div class="pending-card">
        <div class="pending-icon">
            <i class="fas fa-clock"></i>
        </div>
        <h1 class="pending-title">Accès en attente</h1>
        <div class="pending-message">
            <p>Votre compte a été créé avec succès, mais nécessite une validation par l'administrateur.</p>
            <p>Vous recevrez un accès complet une fois que votre compte aura été validé.</p>
        </div>
        <div class="pending-info">
            <div class="info-item">
                <i class="fas fa-user"></i>
                <span><?php echo e(Auth::user()->name); ?></span>
            </div>
            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <span><?php echo e(Auth::user()->email); ?></span>
            </div>
        </div>
        <div class="pending-actions">
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-sign-out-alt mr-2"></i>Se déconnecter
                </button>
            </form>
        </div>
    </div>
</div>

<style>
.pending-container {
    min-height: calc(100vh - 150px);
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f6f9fc 0%, #f1f5f9 100%);
}

.pending-card {
    background: white;
    padding: 0.5rem;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    max-width: 600px;
    width: 100%;
    text-align: center;
}

.pending-icon {
    font-size: 4rem;
    color: #4299e1;
    margin-bottom: 0.5rem;
    animation: pulse 2s infinite;
}

.pending-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.pending-message {
    color: #718096;
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
}

.pending-message p {
    margin-bottom: 1rem;
}

.pending-info {
    background: #f7fafc;
    padding: 0.5rem;
    border-radius: 15px;
    margin-bottom: 0.5rem;
}

.info-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 0.75rem;
    color: #4a5568;
}

.info-item i {
    color: #4299e1;
}

.pending-actions {
    margin-top: 2rem;
}

.btn-outline-primary {
    color: #4299e1;
    border: 2px solid #4299e1;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-outline-primary:hover {
    background: #4299e1;
    color: white;
    transform: translateY(-2px);
}

@keyframes  pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.7;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@media (max-width: 640px) {
    .pending-card {
        padding: 0.5rem;
    }

    .pending-title {
        font-size: 1.75rem;
    }

    .pending-message {
        font-size: 1rem;
    }
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/auth/pending_access.blade.php ENDPATH**/ ?>