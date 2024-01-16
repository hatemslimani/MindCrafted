

<?php $__env->startSection('content'); ?>
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="hero-title">Bienvenue sur notre plateforme E-Learning</h1>
                <p class="hero-text">Découvrez une nouvelle façon d'apprendre avec nos cours en ligne interactifs.</p>
                <?php if(auth()->guard()->guest()): ?>
                    <div class="hero-buttons">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg">Se connecter</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-light btn-lg ml-3">S'inscrire</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <img src="<?php echo e(asset('img/educator_re_ju47.svg')); ?>" alt="E-Learning" class="hero-image">
            </div>
        </div>
    </div>
</div>

<div class="features-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Nos fonctionnalités</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <h3>Cours interactifs</h3>
                    <p>Accédez à des cours riches en contenu et interactifs</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">📝</div>
                    <h3>Tests & Examens</h3>
                    <p>Évaluez vos connaissances avec nos tests en ligne</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">👨‍🏫</div>
                    <h3>Enseignants qualifiés</h3>
                    <p>Apprenez avec des professeurs expérimentés</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 6rem 0;
    color: white;
    margin-top: -2rem;
}

.hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.hero-text {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.hero-image {
    width: 100%;
    max-width: 500px;
    animation: float 6s ease-in-out infinite;
}

.hero-buttons .btn {
    padding: 0.8rem 2rem;
    font-weight: 600;
}

.features-section {
    padding: 5rem 0;
    background-color: #f8f9fa;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 3rem;
}

.feature-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.feature-card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 1rem;
}

.feature-card p {
    color: #4a5568;
    margin-bottom: 0;
}

@keyframes  float {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
    100% {
        transform: translateY(0px);
    }
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/index.blade.php ENDPATH**/ ?>