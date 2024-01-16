

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="student-header mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="student-title">
                    <i class="fas fa-file-alt mr-2"></i><?php echo e($data->name); ?>

                </h1>
                <p class="text-muted mb-0">
                    <i class="far fa-clock mr-2"></i>Durée : <?php echo e($data->duree); ?> minutes
                </p>
            </div>
            <div class="col-md-4 text-right">
                <div class="exam-timer" id="examTimer">
                    <i class="fas fa-hourglass-half mr-2"></i>
                    <span id="timer"><?php echo e($data->duree); ?>:00</span>
                </div>
            </div>
        </div>
    </div>

    <form action="<?php echo e(url('home/mesCours/examen/storeOptionExam/'.$id)); ?>" method="get" id="examForm">
        <div class="question-list">
            <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="question-card">
                <div class="question-header">
                    <div class="question-number">Question <?php echo e($key + 1); ?></div>
                    <div class="question-text"><?php echo e($q->question); ?></div>
                </div>
                <div class="options-list">
                    <?php $__currentLoopData = $option[$q->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="option-item">
                        <input type="radio" name="<?php echo e($q->id); ?>" value="<?php echo e($opt->options); ?>" required>
                        <div class="option-content">
                            <div class="option-marker">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="option-text"><?php echo e($opt->options); ?></div>
                        </div>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="submit-section">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-paper-plane mr-2"></i>Soumettre l'examen
            </button>
        </div>
    </form>
</div>

<style>
.question-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 2rem;
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
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.option-item {
    display: block;
    margin: 0;
    cursor: pointer;
}

.option-item input[type="radio"] {
    display: none;
}

.option-content {
    display: flex;
    align-items: center;
    padding: 1rem;
    border-radius: 10px;
    background: #f7fafc;
    transition: all 0.3s ease;
}

.option-item:hover .option-content {
    background: #ebf8ff;
}

.option-item input[type="radio"]:checked + .option-content {
    background: #ebf8ff;
    border: 2px solid #4299e1;
}

.option-marker {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 2px solid #cbd5e0;
    margin-right: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.option-marker i {
    color: transparent;
    font-size: 0.75rem;
    transition: all 0.3s ease;
}

.option-item input[type="radio"]:checked + .option-content .option-marker {
    border-color: #4299e1;
    background: #4299e1;
}

.option-item input[type="radio"]:checked + .option-content .option-marker i {
    color: white;
}

.option-text {
    flex: 1;
    color: #4a5568;
    font-size: 1rem;
}

.submit-section {
    text-align: center;
    margin-top: 2rem;
    padding: 2rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.btn-primary {
    background: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
    border: none;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.exam-timer {
    background: #ebf8ff;
    color: #2b6cb0;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1.25rem;
    display: inline-flex;
    align-items: center;
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
</style>

<script>
// Timer pour l'examen
function startTimer(duration) {
    let timer = duration * 60;
    const timerDisplay = document.getElementById('timer');
    
    const countdown = setInterval(function () {
        const minutes = parseInt(timer / 60, 10);
        const seconds = parseInt(timer % 60, 10);

        timerDisplay.textContent = minutes.toString().padStart(2, '0') + ':' + 
                                 seconds.toString().padStart(2, '0');

        if (--timer < 0) {
            clearInterval(countdown);
            document.getElementById('examForm').submit();
        }
    }, 1000);
}


window.onload = function() {
    startTimer(<?php echo e($data->duree); ?>);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/user/examen.blade.php ENDPATH**/ ?>