<?php $__env->startSection('title', 'I\'m Santa to?'); ?>
<?php $__env->startSection('content'); ?>
    <div class="bigTitle">
        <h1>I'm Santa to?</h1>
    </div>
        <?php if(isset($child_user)): ?>
            <div class="">
                <div class="card2" style=" font-size: 1em; overflow: hidden; padding: 0; border: none; border-radius: .28571429rem; box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;">
                    <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/santa2.png">
                    <div class="card-block" style="font-size: 1em; position: relative; margin: 0; padding: 1em; border: none; box-shadow: none;">
                        <p class="card-title" style="font-size: 1.28571429em; font-weight: 700; line-height: 1.2857em;"><?php echo e(ucfirst($child_user->name)); ?></p>
                        <p class="card-title" style="font-size: 1.28571429em; font-weight: 300; line-height: 1.2857em;"><?php echo e(ucfirst($child_user->email)); ?></p>
                            <p class="card-title" style="font-size: 1.28571429em; font-weight: 300; line-height: 1.2857em;">Address: <?php echo e(ucfirst($child_user->address)); ?></p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="formsContainer">
                <div class="imgContainerKey">
                    <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/santagift.jpg" alt="coolsanta">
                </div>
                <?php if($user->child_hash_info): ?>
                    <form method="POST" action="/getMySanta">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="key" class="">Enter Your Key</label>

                            <div class="">
                                <input id="key"
                                       type="key"
                                       class="form-control <?php $__errorArgs = ['key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="key"
                                       value="<?php echo e(request('key') ?? session('key') ?? ''); ?>"
                                       
                                       required
                                       autocomplete="key" autofocus>

                                <?php if(isset($error)): ?>
                                    <div class="alert alert-danger"><?php echo e($error); ?></div>
                                <?php endif; ?>
                                <?php $__errorArgs = ['key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Santa to Who?</button>
                    </form>

                    <?php else: ?>
                    <h1>It's still early. Wait for the draw and the key to unlock the person to whom you are Secret Santa!</h1>
                <?php endif; ?>
            </div>
            <br>
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aleksandar\Desktop\work\secret-santa\resources\views/pages/imsantato.blade.php ENDPATH**/ ?>