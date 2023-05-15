

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.checkIn.title_singular')); ?>

                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?php echo e(route("admin.check-ins.store")); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group <?php echo e($errors->has('user') ? 'has-error' : ''); ?>">
                                <label class="required" for="user_id"><?php echo e(trans('cruds.checkIn.fields.user')); ?></label>
                                <select class="form-control select2" name="user_id" id="user_id" required>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(old('user_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('user')): ?>
                                    <span class="help-block" role="alert"><?php echo e($errors->first('user')); ?></span>
                                <?php endif; ?>
                                <span class="help-block"><?php echo e(trans('cruds.checkIn.fields.user_helper')); ?></span>
                            </div>
                            <div class="form-group <?php echo e($errors->has('type') ? 'has-error' : ''); ?>">
                                <label for="type_id"><?php echo e(trans('cruds.checkIn.fields.type')); ?></label>
                                <select class="form-control select2" name="type_id" id="type_id">
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(old('type_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('type')): ?>
                                    <span class="help-block" role="alert"><?php echo e($errors->first('type')); ?></span>
                                <?php endif; ?>
                                <span class="help-block"><?php echo e(trans('cruds.checkIn.fields.type_helper')); ?></span>
                            </div>
                            <div class="form-group <?php echo e($errors->has('project') ? 'has-error' : ''); ?>">
                                <label class="required" for="project_id"><?php echo e(trans('cruds.checkIn.fields.project')); ?></label>
                                <select class="form-control select2" name="project_id" id="project_id" required>
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(old('project_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('project')): ?>
                                    <span class="help-block" role="alert"><?php echo e($errors->first('project')); ?></span>
                                <?php endif; ?>
                                <span class="help-block"><?php echo e(trans('cruds.checkIn.fields.project_helper')); ?></span>
                            </div>
                            <div class="form-group <?php echo e($errors->has('check_in') ? 'has-error' : ''); ?>">
                                <label for="check_in"><?php echo e(trans('cruds.checkIn.fields.check_in')); ?></label>
                                <input class="form-control datetime <?php echo e($errors->has('check_in') ? 'is-invalid' : ''); ?>" type="text" name="check_in" id="check_in" value="<?php echo e(old('check_in')); ?>">
<?php if($errors->has('check_in')): ?>
<span class="help-block" role="alert"><?php echo e($errors->first('check_in')); ?></span>
<?php endif; ?>
</div>
<div class="form-group <?php echo e($errors->has('check_out') ? 'has-error' : ''); ?>">
<label for="check_out"><?php echo e(trans('cruds.checkIn.fields.check_out')); ?></label>
<input class="form-control datetime <?php echo e($errors->has('check_out') ? 'is-invalid' : ''); ?>" type="text" name="check_out" id="check_out" value="<?php echo e(old('check_out')); ?>">
<?php if($errors->has('check_out')): ?>
<span class="help-block" role="alert"><?php echo e($errors->first('check_out')); ?></span>
<?php endif; ?>
<span class="help-block"><?php echo e(trans('cruds.checkIn.fields.check_out_helper')); ?></span>
</div>
<div class="form-group <?php echo e($errors->has('work_type') ? 'has-error' : ''); ?>">
<label for="work_type_id"><?php echo e(trans('cruds.checkIn.fields.work_type')); ?></label>
<select class="form-control select2" name="work_type_id" id="work_type_id">
<?php $__currentLoopData = $workTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($id); ?>" <?php echo e(old('work_type_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php if($errors->has('work_type')): ?>
<span class="help-block" role="alert"><?php echo e($errors->first('work_type')); ?></span>
<?php endif; ?>
<span class="help-block"><?php echo e(trans('cruds.checkIn.fields.work_type_helper')); ?></span>
</div>
<div class="form-group <?php echo e($errors->has('notes') ? 'has-error' : ''); ?>">
<label for="notes"><?php echo e(trans('cruds.checkIn.fields.notes')); ?></label>
<textarea class="form-control <?php echo e($errors->has('notes') ? 'is-invalid' : ''); ?>" name="notes" id="notes"><?php echo e(old('notes')); ?></textarea>
<?php if($errors->has('notes')): ?>
<span class="help-block" role="alert"><?php echo e($errors->first('notes')); ?></span>
<?php endif; ?>
<span class="help-block"><?php echo e(trans('cruds.checkIn.fields.notes_helper')); ?></span>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/checkIns/create.blade.php ENDPATH**/ ?>