<?php $__env->startSection('content'); ?>
<?php if($data): ?>
<div class="container">
  <div class="student-header mb-4">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h1 class="student-title">
          <i class="fas fa-file-alt mr-2"></i><?php echo e($data->name); ?>

        </h1>
      </div>
    </div>
  </div>

  <form class="quiz-form" method="GET" action="storeOptiontest/<?php echo e($id); ?>">
    <?php echo csrf_field(); ?>
    <?php if(count($question) > 0): ?>
    <div class="question-list">
      <?php $k = 1; ?>
      <?php for($i = 0; $i < count($question); $i++): ?>
        <div class="question-card">
        <div class="question-header">
          <div class="question-number">Question <?php echo e($i + 1); ?></div>
          <div class="question-text"><?php echo e($question[$i]->question); ?></div>
        </div>
        <div class="options-list">
          <?php if(count($option[$question[$i]->id]) > 0): ?>
          <?php $__currentLoopData = $option[$question[$i]->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <label class="option-item">
            <input type="radio" id="<?php echo e($k + $index); ?>" name="<?php echo e($question[$i]->id); ?>" value="<?php echo e($opt->options); ?>" required>
            <div class="option-content">
              <div class="option-marker">
                <i class="fas fa-check"></i>
              </div>
              <div class="option-text"><?php echo e($opt->options); ?></div>
            </div>
          </label>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
    </div>
    <?php $k += count($option[$question[$i]->id]); ?>
    <?php endfor; ?>
</div>
<?php else: ?>
<div class="text-center">
  <h1>aucune question dans cette examen</h1>
</div>
<?php endif; ?>
<div class="submit-section">
  <button type="submit" class="btn btn-primary btn-lg">
    <i class="fas fa-paper-plane mr-2"></i>Enregistrer
  </button>
</div>
</form>
<?php endif; ?>
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

  .option-item input[type="radio"]:checked+.option-content {
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

  .option-item input[type="radio"]:checked+.option-content .option-marker {
    border-color: #4299e1;
    background: #4299e1;
  }

  .option-item input[type="radio"]:checked+.option-content .option-marker i {
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

  .student-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
  }

  .student-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
  }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/user/test.blade.php ENDPATH**/ ?>