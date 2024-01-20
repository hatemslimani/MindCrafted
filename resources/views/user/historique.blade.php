@extends('layouts.app')

@section('content')
<div class="container">
    <div class="student-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="student-title">
                    <i class="fas fa-history mr-2"></i>Historique des résultats
                </h1>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>Retour
                </a>
            </div>
        </div>
    </div>

    <div class="results-container">
        @forelse($data as $result)
        <div class="result-card">
            <div class="result-header {{ $result->categorie == 'exam' ? 'exam-header' : 'test-header' }}">
                <div class="result-type">
                    <i class="fas {{ $result->categorie == 'exam' ? 'fa-file-alt' : 'fa-tasks' }} mr-2"></i>
                    {{ $result->categorie == 'exam' ? 'Examen' : 'Test' }}
                </div>
                <div class="result-date">
                    {{ \Carbon\Carbon::parse($result->created_at)->format('d/m/Y H:i') }}
                </div>
            </div>
            <div class="result-body">
                <h3 class="result-title">{{ $result->name }}</h3>
                <div class="result-score">
                    <div class="score-circle {{ getScoreClass($result->moyen) }}">
                        {{ $result->moyen }}/20
                    </div>
                    <div class="score-label">
                        {{ getScoreLabel($result->moyen) }}
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-state-icon">📊</div>
            <h3>Aucun résultat</h3>
            <p>Vous n'avez pas encore passé de tests ou d'examens dans cette section.</p>
        </div>
        @endforelse
    </div>
</div>

<style>
.results-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-top: 1rem;
}

.result-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
    overflow: hidden;
}

.result-card:hover {
    transform: translateY(-5px);
}

.result-header {
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
}

.exam-header {
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
}

.test-header {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
}

.result-type {
    font-weight: 500;
    display: flex;
    align-items: center;
}

.result-date {
    font-size: 0.875rem;
    opacity: 0.9;
}

.result-body {
    padding: 1.5rem;
    text-align: center;
}

.result-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 1.5rem;
}

.result-score {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.score-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
}

.score-excellent {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
}

.score-good {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
}

.score-average {
    background: linear-gradient(135deg, #ecc94b 0%, #d69e2e 100%);
}

.score-poor {
    background: linear-gradient(135deg, #f56565 0%, #c53030 100%);
}

.score-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #4a5568;
}

.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 3rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.empty-state-icon {
    font-size: 4rem;
    margin-bottom: 1.5rem;
}

.empty-state h3 {
    color: #2d3748;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #718096;
    margin-bottom: 0;
}

.student-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.student-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.btn-outline-secondary {
    color: #4a5568;
    border: 2px solid #cbd5e0;
    padding: 0.5rem 1.5rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    background-color: #f7fafc;
    color: #2d3748;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.btn-outline-secondary i {
    font-size: 0.875rem;
}
</style>

@php
function getScoreClass($score) {
    if ($score >= 16) return 'score-excellent';
    if ($score >= 14) return 'score-good';
    if ($score >= 10) return 'score-average';
    return 'score-poor';
}

function getScoreLabel($score) {
    if ($score >= 16) return 'Excellent';
    if ($score >= 14) return 'Très bien';
    if ($score >= 10) return 'Bien';
    return 'À améliorer';
}
@endphp
@endsection