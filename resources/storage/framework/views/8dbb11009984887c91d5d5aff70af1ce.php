<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.tracking.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.trackings.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('lat') ? 'has-error' : ''); ?>">
                            <label class="required" for="lat"><?php echo e(trans('cruds.tracking.fields.lat')); ?></label>
                            <input class="form-control" type="text" name="lat" id="lat" value="<?php echo e(old('lat', '')); ?>" required>
                            <?php if($errors->has('lat')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('lat')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.tracking.fields.lat_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('lon') ? 'has-error' : ''); ?>">
                            <label class="required" for="lon"><?php echo e(trans('cruds.tracking.fields.lon')); ?></label>
                            <input class="form-control" type="text" name="lon" id="lon" value="<?php echo e(old('lon', '')); ?>" required>
                            <?php if($errors->has('lon')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('lon')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.tracking.fields.lon_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('user') ? 'has-error' : ''); ?>">
                            <label class="required" for="user_id"><?php echo e(trans('cruds.tracking.fields.user')); ?></label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('user_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('user')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('user')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.tracking.fields.user_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('action') ? 'has-error' : ''); ?>">
                            <label><?php echo e(trans('cruds.tracking.fields.action')); ?></label>
                            <select class="form-control" name="action" id="action">
                                <option value disabled <?php echo e(old('action', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                                <?php $__currentLoopData = App\Models\Tracking::ACTION_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(old('action', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('action')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('action')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.tracking.fields.action_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/trackings/create.blade.php ENDPATH**/ ?>