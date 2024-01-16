
    <?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Mes matière : </h2>
        <div class="row">
        <?php if(!empty($data)): ?>
            <?php for($i=0;$i < count($data);$i++): ?>
            <div class="col-md-3" style="padding:10px;">
                <div class="card" style="width: 17rem;">
                    <div class="card-body overflow-auto" style="height: 18rem;">
                        <h5 class="card-title"><?php echo e($data[$i]->namesection); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo e($data[$i]->name); ?></h6>
                        <p class="card-text"><?php echo e($data[$i]->description); ?></p>
                        <a href=" <?php echo e(url('home/historique')); ?>/<?php echo e($data[$i]->id); ?> " class="card-link">HISTORIQUE</a>
                        <a href=" <?php echo e(url('home/mesCours')); ?>/<?php echo e($data[$i]->id); ?> " class="card-link">VIEW</a>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        <?php else: ?>
            aucun matier
        <?php endif; ?>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\My project\E-learning - Copie\resources\views/user/section.blade.php ENDPATH**/ ?>