<?php $__env->startSection('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo e(route('admin.home')); ?>">
            <?php echo e(trans('panel.site_title')); ?>

        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            <?php echo e(trans('global.login')); ?>

        </p>

        <?php if(session('message')): ?>
            <p class="alert alert-info">
                <?php echo e(session('message')); ?>

            </p>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <input id="email" type="email" name="email" class="form-control" required autocomplete="email" autofocus placeholder="<?php echo e(trans('global.login_email')); ?>" value="<?php echo e(old('email', null)); ?>">

                <?php if($errors->has('email')): ?>
                    <p class="help-block">
                        <?php echo e($errors->first('email')); ?>

                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <input id="password" type="password" name="password" class="form-control" required placeholder="<?php echo e(trans('global.login_password')); ?>">

                <?php if($errors->has('password')): ?>
                    <p class="help-block">
                        <?php echo e($errors->first('password')); ?>

                    </p>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label><input type="checkbox" name="remember"> <?php echo e(trans('global.remember_me')); ?></label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        <?php echo e(trans('global.login')); ?>

                    </button>
                </div>
            </div>
        </form>

        <?php if(Route::has('password.request')): ?>
            <a href="<?php echo e(route('password.request')); ?>">
                <?php echo e(trans('global.forgot_password')); ?>

            </a><br>
        <?php endif; ?>

        <a href="<?php echo e(route('register')); ?>"><?php echo e(trans('global.register')); ?></a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/auth/login.blade.php ENDPATH**/ ?>