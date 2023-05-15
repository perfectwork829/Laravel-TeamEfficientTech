
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.timeProject.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.time-projects.update", [$timeProject->id])); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label class="required" for="name"><?php echo e(trans('cruds.timeProject.fields.name')); ?></label>
                            <input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name', $timeProject->name)); ?>" required>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.timeProject.fields.name_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                            <label for="address"><?php echo e(trans('cruds.timeProject.fields.address')); ?></label>
                            <textarea class="form-control" name="address" id="address"><?php echo e(old('address', $timeProject->address)); ?></textarea>
                            <?php if($errors->has('address')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('address')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.timeProject.fields.address_helper')); ?></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                <?php echo e(trans('global.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/timeProjects/edit.blade.php ENDPATH**/ ?>