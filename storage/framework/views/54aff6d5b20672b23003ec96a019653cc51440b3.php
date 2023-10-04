<?php $__env->startSection('title', 'Candidates'); ?>
<?php $__env->startSection('content'); ?>
    <div class="bigTitle">
        <h1>Candidates for Secret Santa!</h1>
    </div>
    <p>This is the list of all participating candidates!</p>

    <div>
        <div class="timer">
            <p id="demo"></p>
        </div>

    <?php if(count($users) > 0): ?>
            <?php if(isset($users)): ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                        <div class="card" style=" font-size: 1em; overflow: hidden; padding: 0; border: none; border-radius: .28571429rem; box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;">
                            <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/santa2.png" alt="santacardimg">
                            <div class="card-block" style="font-size: 1em; position: relative; margin: 0; padding: 1em; border: none; box-shadow: none;">
                                <p class="card-title" style="font-size: 1.28571429em; font-weight: 700; line-height: 1.2857em;"><?php echo e(ucfirst($user->name)); ?></p>
                                <p class="card-text"><b><?php echo e($user->email); ?></b></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php else: ?>
            <p>There are no candidates!</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aleksandar\Desktop\work\secret-santa\resources\views/pages/candidates.blade.php ENDPATH**/ ?>