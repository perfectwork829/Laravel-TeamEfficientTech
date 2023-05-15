<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.checkInType.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.check-in-types.update", [$checkInType->id])); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('check_in_type') ? 'has-error' : ''); ?>">
                            <label class="required" for="check_in_type"><?php echo e(trans('cruds.checkInType.fields.check_in_type')); ?></label>
                            <input class="form-control" type="text" name="check_in_type" id="check_in_type" value="<?php echo e(old('check_in_type', $checkInType->check_in_type)); ?>" required>
                            <?php if($errors->has('check_in_type')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('check_in_type')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.checkInType.fields.check_in_type_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('notes') ? 'has-error' : ''); ?>">
                            <label for="notes"><?php echo e(trans('cruds.checkInType.fields.notes')); ?></label>
                            <textarea class="form-control" name="notes" id="notes"><?php echo e(old('notes', $checkInType->notes)); ?></textarea>
                            <?php if($errors->has('notes')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('notes')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.checkInType.fields.notes_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/checkInTypes/edit.blade.php ENDPATH**/ ?>