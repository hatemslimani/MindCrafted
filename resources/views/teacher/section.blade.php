@extends('layouts.app')

@section('content')
<div class="container">
    <div class="teacher-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="teacher-title">
                    <i class="fas fa-book-reader mr-2"></i>Mes Sections
                </h1>
            </div>
            <div class="col-md-6 text-right">
                <div class="date">{{ now()->format('l, d F Y') }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($section as $sec)
        <div class="col-md-4 mb-4">
            <div class="section-card">
                <div class="section-card-header">
                    <div class="section-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3 class="section-name">{{ $sec->namesection }}</h3>
                    <div class="section-group">
                        <i class="fas fa-layer-group mr-1"></i>
                        Groupe {{ $sec->group_id }}
                    </div>
                </div>
                <div class="section-card-body">
                    <p class="section-description">{{ $sec->description }}</p>
                    <div class="section-stats">
                        <div class="stat-item">
                            <i class="fas fa-book-open"></i>
                            <span>{{ $sec->courses_count ?? 0 }} Cours</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-users"></i>
                            <span>{{ $sec->students_count ?? 0 }} Étudiants</span>
                        </div>
                    </div>
                    <a href="{{ url('teacher/mesCours/'.$sec->id) }}" class="btn btn-primary btn-block mt-3">
                        <i class="fas fa-eye mr-2"></i>Voir les détails
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.section-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
    height: 100%;
}

.section-card:hover {
    transform: translateY(-5px);
}

.section-card-header {
    padding: 1.5rem;
    text-align: center;
    border-bottom: 1px solid #e2e8f0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px 15px 0 0;
    color: white;
}

.section-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
}

.section-name {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.section-group {
    font-size: 0.875rem;
    opacity: 0.9;
}

.section-card-body {
    padding: 1.5rem;
}

.section-description {
    color: #4a5568;
    margin-bottom: 1rem;
    font-size: 0.875rem;
    line-height: 1.5;
}

.section-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1.5rem;
    padding: 0.75rem;
    background: #f7fafc;
    border-radius: 10px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #4a5568;
    font-size: 0.875rem;
}

.stat-item i {
    color: #4299e1;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    transform: translateY(-1px);
}

/* Styles hérités du dashboard */
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
    margin: 0;
}

.date {
    color: #718096;
    font-size: 1.1rem;
}
</style>
@endsection