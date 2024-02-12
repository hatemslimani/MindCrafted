@extends('layouts.app')

@section('content')
<div class="container">
    <div class="teacher-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="teacher-title">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>Tableau de bord enseignant
                </h1>
                <p class="text-muted mb-0">Bienvenue, {{ Auth::user()->name }}</p>
            </div>
            <div class="col-md-6 text-right">
                <div class="date">{{ now()->format('l, d F Y') }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Statistiques -->
        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">👨🏻‍🎓</div>
                    <h5>Total Étudiants</h5>
                    <div class="stat-number">{{ $totalStudents ?? '0' }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">📚</div>
                    <h5>Total Sections</h5>
                    <div class="stat-number">{{ $totalSections ?? '0' }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon">📝</div>
                    <h5>Total Tests</h5>
                    <div class="stat-number">{{ $totalTests ?? '0' }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Sections récentes -->
        <div class="col-md-8 mb-4">
            <div class="teacher-card">
                <h3 class="teacher-card-title">
                    <i class="fas fa-book-reader mr-2"></i>Mes sections récentes
                </h3>
                <div class="section-list">
                    @forelse($recentSections ?? [] as $section)
                    <div class="section-item">
                        <div class="section-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="section-details">
                            <div class="section-name">{{ $section->namesection }}</div>
                            <div class="section-info">
                                <span><i class="fas fa-users mr-1"></i>{{ $section->students_count ?? 0 }} étudiants</span>
                                <span><i class="fas fa-tasks ml-3 mr-1"></i>{{ $section->content_count ?? 0 }} contenus</span>
                            </div>
                        </div>
                        <a href="{{ url('teacher/mesCours/'.$section->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    @empty
                    <div class="text-muted text-center py-3">
                        Aucune section récente
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Activités récentes -->
        <div class="col-md-4 mb-4">
            <div class="teacher-card">
                <h3 class="teacher-card-title">
                    <i class="fas fa-history mr-2"></i>Activités récentes
                </h3>
                <div class="activity-list">
                    @forelse($recentActivities ?? [] as $activity)
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas {{ $activity->icon ?? 'fa-circle' }}"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-text">{{ $activity->description }}</div>
                            <div class="activity-time">{{ $activity->created_at }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="text-muted text-center py-3">
                        Aucune activité récente
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.teacher-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.teacher-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
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

.teacher-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0,0,0,.05);
    height: 100%;
}

.teacher-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 1.5rem;
}

.section-list, .activity-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.section-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    background: #f7fafc;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.section-item:hover {
    transform: translateX(5px);
    background: #ebf4ff;
}

.section-icon {
    width: 40px;
    height: 40px;
    background: #ebf4ff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    color: #4299e1;
}

.section-details {
    flex: 1;
}

.section-name {
    font-weight: 600;
    color: #2d3748;
}

.section-info {
    font-size: 0.875rem;
    color: #718096;
    margin-top: 0.25rem;
}

.activity-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    background: #f7fafc;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.activity-item:hover {
    background: #ebf4ff;
    transform: translateX(5px);
}

.activity-icon {
    width: 40px;
    height: 40px;
    background: #ebf4ff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    color: #4299e1;
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

.btn-outline-primary {
    color: #4299e1;
    border-color: #4299e1;
}

.btn-outline-primary:hover {
    background-color: #4299e1;
    color: white;
}
</style>
@endsection
