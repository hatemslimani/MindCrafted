@extends('layouts.app')

@section('content')
<div class="container">
    <div class="teacher-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="teacher-title">
                    <i class="fas fa-file-alt mr-2"></i>{{ $data->name }}
                </h1>
                <p class="text-muted mb-0">
                    <i class="far fa-clock mr-2"></i>Durée : {{ $data->duree }} minutes
                </p>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
                    <i class="fas fa-plus-circle mr-2"></i>Ajouter une question
                </button>
            </div>
        </div>
    </div>

    @if(session('succ'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session('succ') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    <div class="question-list">
        @foreach($question as $key => $q)
        <div class="question-card">
            <div class="question-header">
                <div class="question-number">Question {{ $key + 1 }}</div>
                <div class="question-text">{{ $q->question }}</div>
            </div>
            <div class="options-list">
                @foreach($option[$q->id] as $opt)
                <div class="option-item {{ $opt->is_correct ? 'correct' : '' }}">
                    <div class="option-marker">
                        @if($opt->is_correct)
                            <i class="fas fa-check-circle"></i>
                        @else
                            <i class="fas fa-circle"></i>
                        @endif
                    </div>
                    <div class="option-text">{{ $opt->options }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Ajout Question -->
<div class="modal fade" id="addQuestionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle mr-2"></i>Ajouter une question
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ url('teacher/mesCours/viewExam/addQuestion/'.$data->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Question</label>
                        <textarea name="question" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="options-form">
                        <label>Options</label>
                        <div class="option-inputs">
                            @for($i = 1; $i <= 4; $i++)
                            <div class="option-input-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="is_correct" value="{{ $i }}" required 
                                                   {{ $i == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" name="option[]" class="form-control" 
                                           placeholder="Option {{ $i }}" required>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <small class="form-text text-muted">
                            Sélectionnez le bouton radio pour la bonne réponse
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.question-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.question-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.question-header {
    padding: 1.5rem;
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
    color: white;
}

.question-number {
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.5rem;
}

.question-text {
    font-size: 1.1rem;
    font-weight: 500;
}

.options-list {
    padding: 1.5rem;
}

.option-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    margin-bottom: 0.5rem;
    border-radius: 10px;
    background: #f7fafc;
    transition: all 0.3s ease;
}

.option-item:last-child {
    margin-bottom: 0;
}

.option-item.correct {
    background: #f0fff4;
}

.option-marker {
    width: 24px;
    height: 24px;
    margin-right: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.option-marker i {
    font-size: 1.25rem;
}

.correct .option-marker i {
    color: #48bb78;
}

.option-text {
    flex: 1;
    color: #4a5568;
}

.correct .option-text {
    color: #2f855a;
    font-weight: 500;
}

.options-form {
    margin-top: 1.5rem;
}

.option-input-group {
    margin-bottom: 1rem;
}

.input-group-text {
    background: #f7fafc;
    border-color: #e2e8f0;
}

.alert {
    border-left: 4px solid;
}

.alert-success {
    border-left-color: #48bb78;
}

/* Styles hérités */
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

.modal-content {
    border: none;
    border-radius: 15px;
}

.modal-header {
    border-bottom: 1px solid #e2e8f0;
    padding: 1.5rem;
}

.modal-body {
    padding: 1.5rem;
}

.modal-footer {
    border-top: 1px solid #e2e8f0;
    padding: 1.5rem;
}
</style>
@endsection
