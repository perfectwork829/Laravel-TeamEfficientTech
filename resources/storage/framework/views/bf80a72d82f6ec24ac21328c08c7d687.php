<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.task.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.tasks.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('starttime') ? 'has-error' : ''); ?>">
                            <label class="required" for="starttime"><?php echo e(trans('cruds.task.fields.starttime')); ?></label>
                            <input class="form-control datetime" type="text" name="starttime" id="starttime" value="<?php echo e(old('starttime')); ?>" required>
                            <?php if($errors->has('starttime')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('starttime')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.task.fields.starttime_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('endtime') ? 'has-error' : ''); ?>">
                            <label class="required" for="endtime"><?php echo e(trans('cruds.task.fields.endtime')); ?></label>
                            <input class="form-control datetime" type="text" name="endtime" id="endtime" value="<?php echo e(old('endtime', '')); ?>" required>
                            <?php if($errors->has('endtime')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('endtime')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.task.fields.endtime_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                            <label for="description"><?php echo e(trans('cruds.task.fields.description')); ?></label>
                            <textarea class="form-control" name="description" id="description"><?php echo e(old('description')); ?></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('description')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.task.fields.description_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('assigned_to') ? 'has-error' : ''); ?>">
                            <label class="required" for="assigned_to_id"><?php echo e(trans('cruds.task.fields.assigned_to')); ?></label>
                            <select class="form-control select2" name="assigned_to_id" id="assigned_to_id" required>
                                <?php $__currentLoopData = $assigned_tos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('assigned_to_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('assigned_to')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('assigned_to')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.task.fields.assigned_to_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/tasks/create.blade.php ENDPATH**/ ?>