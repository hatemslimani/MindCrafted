@extends('layouts.app')

@section('content')
<div class="error-container">
    <div class="error-content">
        <div class="error-code">404</div>
        <div class="error-icon">
            <i class="fas fa-search"></i>
        </div>
        <h1 class="error-title">Page introuvable</h1>
        <p class="error-message">
            Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
        </p>
        <div class="error-actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home mr-2"></i>Retour à l'accueil
            </a>
            <button onclick="history.back()" class="btn btn-outline-secondary ml-3">
                <i class="fas fa-arrow-left mr-2"></i>Page précédente
            </button>
        </div>
    </div>
</div>

<style>
.error-container {
    min-height: calc(100vh - 150px);
    display: flex;
    align-items: center;
    justify-content: center;
    /* padding: 2rem; */
    background: linear-gradient(135deg, #f6f9fc 0%, #f1f5f9 100%);
}

.error-content {
    text-align: center;
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    max-width: 600px;
    width: 100%;
}

.error-code {
    font-size: 8rem;
    font-weight: 800;
    color: #4299e1;
    line-height: 1;
    margin-bottom: 0.5rem;
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.error-icon {
    font-size: 3rem;
    color: #718096;
    margin-bottom: 0.5rem;
    animation: float 3s ease-in-out infinite;
}

.error-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 1rem;
}

.error-message {
    color: #718096;
    font-size: 1.1rem;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.error-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
    border: none;
    color: white;
}

.btn-outline-secondary {
    border: 2px solid #cbd5e0;
    background: transparent;
    color: #4a5568;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
}

.btn-outline-secondary:hover {
    border-color: #4299e1;
    color: #4299e1;
    background: #ebf8ff;
}

@keyframes float {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0px);
    }
}

@media (max-width: 640px) {
    .error-code {
        font-size: 6rem;
    }
    
    .error-title {
        font-size: 1.5rem;
    }
    
    .error-message {
        font-size: 1rem;
    }
    
    .error-content {
        padding: 2rem;
    }
    
    .error-actions {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
        margin: 0.5rem 0;
    }
}
</style>
@endsection