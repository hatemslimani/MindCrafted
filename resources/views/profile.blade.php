@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-container">
        <!-- En-tête du profil -->
        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="profile-info">
                <h1 class="profile-name">{{ Auth::user()->name }}</h1>
                <p class="profile-role">
                    @if(Auth::user()->category == 1)
                        <i class="fas fa-user-shield mr-2"></i>Administrateur
                    @elseif(Auth::user()->category == 2)
                        <i class="fas fa-chalkboard-teacher mr-2"></i>Enseignant
                    @else
                        <i class="fas fa-user-graduate mr-2"></i>Étudiant
                    @endif
                </p>
            </div>
        </div>

        <!-- Contenu du profil -->
        <div class="profile-content">
            <div class="profile-section">
                <h2 class="section-title">
                    <i class="fas fa-info-circle mr-2"></i>Informations personnelles
                </h2>
                <form action="{{ url('/profile/update') }}" method="POST" class="profile-form">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Nom complet</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                    </div>

                    <div class="form-divider">
                        <span>Modifier le mot de passe</span>
                    </div>

                    <div class="form-group">
                        <label>Mot de passe actuel</label>
                        <input type="password" name="current_password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nouveau mot de passe</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>

            @if(Auth::user()->category == 3)
            <div class="profile-section">
                <h2 class="section-title">
                    <i class="fas fa-chart-line mr-2"></i>Statistiques
                </h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">📚</div>
                        <div class="stat-value">{{ $totalCourses ?? 0 }}</div>
                        <div class="stat-label">Cours suivis</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">📝</div>
                        <div class="stat-value">{{ $completedTests ?? 0 }}</div>
                        <div class="stat-label">Tests complétés</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">🎯</div>
                        <div class="stat-value">{{ $averageScore ?? '0%' }}</div>
                        <div class="stat-label">Moyenne générale</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.profile-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem 0;
}

.profile-header {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    display: flex;
    align-items: center;
    gap: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.profile-avatar {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    font-weight: 600;
    color: white;
}

.profile-name {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.profile-role {
    color: #718096;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    margin: 0;
}

.profile-section {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.section-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-weight: 500;
    color: #4a5568;
    margin-bottom: 0.5rem;
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

.form-divider {
    text-align: center;
    margin: 2rem 0;
    position: relative;
}

.form-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e2e8f0;
}

.form-divider span {
    background: white;
    padding: 0 1rem;
    color: #718096;
    position: relative;
    font-size: 0.875rem;
}

.form-actions {
    margin-top: 2rem;
    text-align: right;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    color: white;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.stat-card {
    background: #f7fafc;
    padding: 1.5rem;
    border-radius: 10px;
    text-align: center;
}

.stat-icon {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #718096;
    font-size: 0.875rem;
}

@media (max-width: 640px) {
    .profile-header {
        flex-direction: column;
        text-align: center;
        padding: 1.5rem;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }

    .profile-role {
        justify-content: center;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection 