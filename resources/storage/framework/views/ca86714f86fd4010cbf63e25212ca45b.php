<?php $__env->startSection('title', trans('global.new_message')); ?>

<?php $__env->startSection('messenger-content'); ?>
<div class="row">
    <div class="col-md-12">
        <form action="<?php echo e(route("admin.messenger.storeTopic")); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-xs-12 form-group">
                            <label for="recipient" class="control-label">
                                <?php echo e(trans('global.recipient')); ?>

                            </label>
                            <select name="recipient" class="form-control">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="subject" class="control-label">
                                <?php echo e(trans('global.subject')); ?>

                            </label>
                            <input type="text" name="subject" class="form-control" />
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="content" class="control-label">
                                <?php echo e(trans('global.content')); ?>

                            </label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="<?php echo e(trans('global.submit')); ?>" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.messenger.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/messenger/create.blade.php ENDPATH**/ ?>