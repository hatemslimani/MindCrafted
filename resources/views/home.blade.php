@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-banner mb-4">
                <h1>Bienvenue, {{ Auth::user()->name }}!</h1>
                <p>Que souhaitez-vous faire aujourd'hui ?</p>
            </div>

            <div class="quick-actions mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="action-card">
                            <div class="action-icon">📚</div>
                            <h3>Mes cours</h3>
                            <p>Accéder à mes cours en ligne</p>
                            <a href="#" class="btn btn-primary">Voir les cours</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="action-card">
                            <div class="action-icon">📝</div>
                            <h3>Mes tests</h3>
                            <p>Voir mes tests et examens</p>
                            <a href="#" class="btn btn-primary">Voir les tests</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="progress-section">
                <h2>Mon progrès</h2>
                <div class="progress-card">
                    <div class="progress-info">
                        <span>Progression globale</span>
                        <span>75%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.welcome-banner {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2rem;
    border-radius: 15px;
    color: white;
    text-align: center;
}

.welcome-banner h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.action-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.action-card:hover {
    transform: translateY(-5px);
}

.action-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.action-card h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.progress-section {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.progress-section h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.progress-card {
    margin-bottom: 1rem;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.progress {
    height: 0.75rem;
    border-radius: 1rem;
    background-color: #e2e8f0;
}

.progress-bar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1rem;
}
</style>
@endsection

