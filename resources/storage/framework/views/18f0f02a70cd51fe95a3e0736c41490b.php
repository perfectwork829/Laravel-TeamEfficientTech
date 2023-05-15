<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.timeEntry.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.time-entries.update", [$timeEntry->id])); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('work_type') ? 'has-error' : ''); ?>">
                            <label for="work_type_id"><?php echo e(trans('cruds.timeEntry.fields.work_type')); ?></label>
                            <select class="form-control select2" name="work_type_id" id="work_type_id">
                                <?php $__currentLoopData = $work_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e((old('work_type_id') ? old('work_type_id') : $timeEntry->work_type->id ?? '') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('work_type')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('work_type')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.timeEntry.fields.work_type_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('project') ? 'has-error' : ''); ?>">
                            <label for="project_id"><?php echo e(trans('cruds.timeEntry.fields.project')); ?></label>
                            <select class="form-control select2" name="project_id" id="project_id">
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e((old('project_id') ? old('project_id') : $timeEntry->project->id ?? '') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('project')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('project')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.timeEntry.fields.project_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('start_time') ? 'has-error' : ''); ?>">
                            <label class="required" for="start_time"><?php echo e(trans('cruds.timeEntry.fields.start_time')); ?></label>
                            <input class="form-control datetime" type="text" name="start_time" id="start_time" value="<?php echo e(old('start_time', $timeEntry->start_time)); ?>" required>
                            <?php if($errors->has('start_time')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('start_time')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.timeEntry.fields.start_time_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('end_time') ? 'has-error' : ''); ?>">
                            <label class="required" for="end_time"><?php echo e(trans('cruds.timeEntry.fields.end_time')); ?></label>
                            <input class="form-control datetime" type="text" name="end_time" id="end_time" value="<?php echo e(old('end_time', $timeEntry->end_time)); ?>" required>
                            <?php if($errors->has('end_time')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('end_time')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.timeEntry.fields.end_time_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('notes') ? 'has-error' : ''); ?>">
                            <label class="required" for="notes"><?php echo e(trans('cruds.timeEntry.fields.notes')); ?></label>
                            <textarea class="form-control" name="notes" id="notes" required><?php echo e(old('notes', $timeEntry->notes)); ?></textarea>
                            <?php if($errors->has('notes')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('notes')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.timeEntry.fields.notes_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/timeEntries/edit.blade.php ENDPATH**/ ?>