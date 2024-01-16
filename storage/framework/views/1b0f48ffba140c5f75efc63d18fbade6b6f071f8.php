<?php $__env->startSection('content'); ?>
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1 class="login-title"><?php echo e(__('Connexion')); ?></h1>
            <p class="login-subtitle">Bienvenue sur <?php echo e(config('app.name', 'MindCrafted')); ?></p>
        </div>

        <form method="POST" action="<?php echo e(route('login')); ?>" class="login-form">
            <?php echo csrf_field(); ?>

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
                       name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
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
                       name="password" required autocomplete="current-password">
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

            <div class="form-group remember-me">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" 
                           id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="remember">
                        <?php echo e(__('Se souvenir de moi')); ?>

                    </label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt mr-2"></i><?php echo e(__('Se connecter')); ?>

                </button>

                <?php if(Route::has('password.request')): ?>
                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('Mot de passe oublié ?')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<style>
.login-container {
    min-height: calc(100vh - 150px);
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f6f9fc 0%, #f1f5f9 100%);
}

.login-card {
    background: white;
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    width: 100%;
    max-width: 450px;
}

.login-header {
    text-align: center;
    margin-bottom: 2rem;
}

.login-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.login-subtitle {
    color: #718096;
    font-size: 1.1rem;
}

.login-form .form-group {
    margin-bottom: 1.5rem;
}

.login-form label {
    display: block;
    font-weight: 500;
    color: #4a5568;
    margin-bottom: 0.5rem;
}

.login-form label i {
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

.remember-me {
    display: flex;
    align-items: center;
}

.custom-control-label {
    font-size: 0.9rem;
    color: #718096;
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

.btn-link {
    color: #4299e1;
    text-decoration: none;
    font-size: 0.9rem;
}

.btn-link:hover {
    text-decoration: underline;
}

.invalid-feedback {
    color: #e53e3e;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

@media (max-width: 640px) {
    .login-card {
        padding: 2rem;
    }

    .login-title {
        font-size: 1.75rem;
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/auth/login.blade.php ENDPATH**/ ?>