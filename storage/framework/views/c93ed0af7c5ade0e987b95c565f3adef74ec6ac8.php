

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="teacher-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="teacher-title">
                    <i class="fas fa-tasks mr-2"></i><?php echo e($data->name); ?>

                </h1>
                <p class="text-muted mb-0"><?php echo e($data->description); ?></p>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
                    <i class="fas fa-plus-circle mr-2"></i>Ajouter une question
                </button>
            </div>
        </div>
    </div>

    <?php if(session('succ')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i><?php echo e(session('succ')); ?>

        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="question-list">
        <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="question-card">
            <div class="question-header">
                <div class="question-number">Question <?php echo e($key + 1); ?></div>
                <div class="question-text"><?php echo e($q->question); ?></div>
            </div>
            <div class="options-list">
                <?php $__currentLoopData = $option[$q->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="option-item <?php echo e($opt->is_correct ? 'correct' : ''); ?>">
                    <div class="option-marker">
                        <?php if($opt->is_correct): ?>
                            <i class="fas fa-check-circle"></i>
                        <?php else: ?>
                            <i class="fas fa-circle"></i>
                        <?php endif; ?>
                    </div>
                    <div class="option-text"><?php echo e($opt->options); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <form action="<?php echo e(url('teacher/mesCours/viewTest/addQuestionTest/'.$data->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Question</label>
                        <textarea name="question" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="options-form">
                        <label>Options</label>
                        <div class="option-inputs">
                            <?php for($i = 1; $i <= 4; $i++): ?>
                            <div class="option-input-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="is_correct" value="<?php echo e($i); ?>" required 
                                                   <?php echo e($i == 1 ? 'checked' : ''); ?>>
                                        </div>
                                    </div>
                                    <input type="text" name="option[]" class="form-control" 
                                           placeholder="Option <?php echo e($i); ?>" required>
                                </div>
                            </div>
                            <?php endfor; ?>
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
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/teacher/test.blade.php ENDPATH**/ ?>