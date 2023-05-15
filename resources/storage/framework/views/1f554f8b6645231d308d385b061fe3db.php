<?php $__env->startSection('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo e(route('admin.home')); ?>">
            <?php echo e(trans('panel.site_title')); ?>

        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            <?php echo e(trans('global.reset_password')); ?>

        </p>

        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>

            <div>
                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="<?php echo e(trans('global.login_email')); ?>" value="<?php echo e(old('email')); ?>">

                    <?php if($errors->has('email')): ?>
                        <span class="help-block" role="alert">
                            <?php echo e($errors->first('email')); ?>

                        </span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-flat btn-block">
                            <?php echo e(trans('global.send_password')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>