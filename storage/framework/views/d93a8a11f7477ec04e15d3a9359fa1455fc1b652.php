<?php $__env->startSection('content'); ?>
<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <h1 class="register-title"><?php echo e(__('Inscription')); ?></h1>
            <p class="register-subtitle">Rejoignez <?php echo e(config('app.name', 'MindCrafted')); ?></p>
        </div>

        <form method="POST" action="<?php echo e(route('register')); ?>" class="register-form">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">
                    <i class="fas fa-user"></i>
                    <?php echo e(__('Nom complet')); ?>

                </label>
                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    <?php echo e(__('Adresse E-Mail')); ?>

                </label>
                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i>
                    <?php echo e(__('Mot de passe')); ?>

                </label>
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       name="password" required autocomplete="new-password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="password-confirm">
                    <i class="fas fa-lock"></i>
                    <?php echo e(__('Confirmer le mot de passe')); ?>

                </label>
                <input id="password-confirm" type="password" class="form-control" 
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus mr-2"></i><?php echo e(__("S'inscrire")); ?>

                </button>
                <p class="login-link">
                    Déjà inscrit ? 
                    <a href="<?php echo e(route('login')); ?>">Se connecter</a>
                </p>
            </div>
        </form>
    </div>
</div>

<style>
.register-container {
    min-height: calc(100vh - 150px);
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f6f9fc 0%, #f1f5f9 100%);
}

.register-card {
    background: white;
    padding: 1.5rem;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    width: 100%;
    max-width: 500px;
}

.register-header {
    text-align: center;
    margin-bottom: 0.1rem;
}

.register-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.1rem;
}

.register-subtitle {
    color: #718096;
    font-size: 1.1rem;
}

.register-form .form-group {
    margin-bottom: 0.5rem;
}

.register-form label {
    display: block;
    font-weight: 500;
    color: #4a5568;
    margin-bottom: 0.5rem;
}

.register-form label i {
    margin-right: 0.5rem;
    color: #4299e1;
}

.form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #4299e1;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
    outline: none;
}

.form-actions {
    margin-top: 2rem;
    text-align: center;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    width: 100%;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.login-link {
    color: #718096;
    font-size: 0.9rem;
    margin-top: 0.1rem;
}

.login-link a {
    color: #4299e1;
    text-decoration: none;
    font-weight: 500;
}

.login-link a:hover {
    text-decoration: underline;
}

.invalid-feedback {
    color: #e53e3e;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

@media (max-width: 640px) {
    .register-card {
        padding: 2rem;
    }

    .register-title {
        font-size: 1.75rem;
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/auth/register.blade.php ENDPATH**/ ?>