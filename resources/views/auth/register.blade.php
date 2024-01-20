@extends('layouts.app')

@section('content')
<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <h1 class="register-title">{{ __('Inscription') }}</h1>
            <p class="register-subtitle">Rejoignez {{ config('app.name', 'MindCrafted') }}</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <div class="form-group">
                <label for="name">
                    <i class="fas fa-user"></i>
                    {{ __('Nom complet') }}
                </label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    {{ __('Adresse E-Mail') }}
                </label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i>
                    {{ __('Mot de passe') }}
                </label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">
                    <i class="fas fa-lock"></i>
                    {{ __('Confirmer le mot de passe') }}
                </label>
                <input id="password-confirm" type="password" class="form-control" 
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus mr-2"></i>{{ __("S'inscrire") }}
                </button>
                <p class="login-link">
                    Déjà inscrit ? 
                    <a href="{{ route('login') }}">Se connecter</a>
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
@endsection
