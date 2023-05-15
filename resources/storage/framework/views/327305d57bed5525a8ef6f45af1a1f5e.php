<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.role.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.roles.update", [$role->id])); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                            <label class="required" for="title"><?php echo e(trans('cruds.role.fields.title')); ?></label>
                            <input class="form-control" type="text" name="title" id="title" value="<?php echo e(old('title', $role->title)); ?>" required>
                            <?php if($errors->has('title')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('title')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.role.fields.title_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('permissions') ? 'has-error' : ''); ?>">
                            <label class="required" for="permissions"><?php echo e(trans('cruds.role.fields.permissions')); ?></label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                            </div>
                            <select class="form-control select2" name="permissions[]" id="permissions" multiple required>
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : ''); ?>><?php echo e($permission); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('permissions')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('permissions')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.role.fields.permissions_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>