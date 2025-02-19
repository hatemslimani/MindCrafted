<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'MindCrafted')); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'MindCrafted')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->category == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('admin')); ?>">
                                <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('admin/controluser')); ?>">
                                <i class="fas fa-users mr-1"></i>Utilisateurs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('admin/controlGroup')); ?>">
                                <i class="fas fa-layer-group mr-1"></i>Groupes
                            </a>
                        </li>
                        <?php elseif(Auth::user()->category == 2): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('teacher')); ?>">
                                <i class="fas fa-chalkboard-teacher mr-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('teacher/mesCours')); ?>">
                                <i class="fas fa-book mr-1"></i>Mes Cours
                            </a>
                        </li>
                        <?php elseif(Auth::user()->category == 3): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/home')); ?>">
                                <i class="fas fa-home mr-2"></i>Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/home/mesCours')); ?>">
                                <i class="fas fa-book mr-2"></i>Mes Cours
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="fas fa-user-circle mr-1"></i>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">
                                    <i class="fas fa-user-cog mr-1"></i>Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-1"></i><?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Ajout de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #2d3748;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
            background: #fff;
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-weight: 600;
            color: #4a5568;
            font-size: 1.5rem;
        }

        .nav-link {
            color: #4a5568 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #2b6cb0 !important;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #4299e1;
            border-color: #4299e1;
        }

        .btn-primary:hover {
            background-color: #2b6cb0;
            border-color: #2b6cb0;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            color: #4a5568;
        }

        .dropdown-item:hover {
            background-color: #ebf4ff;
            color: #2b6cb0;
        }

        .alert {
            border-radius: 5px;
            border: none;
            padding: 1rem 1.5rem;
        }

        .py-4 {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link i {
            font-size: 1.1rem;
            margin-right: 0.5rem;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 1.5rem;
        }

        .dropdown-item i {
            width: 20px;
            margin-right: 0.5rem;
        }

        .dropdown-divider {
            margin: 0.5rem 0;
        }
    </style>
</body>

</html><?php /**PATH E:\My project\E-learning - Copie\resources\views/layouts/app.blade.php ENDPATH**/ ?>