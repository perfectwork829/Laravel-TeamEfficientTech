<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.user.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.users.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label class="required" for="name"><?php echo e(trans('cruds.user.fields.name')); ?></label>
                            <input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name', '')); ?>" required>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.name_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                            <label class="required" for="email"><?php echo e(trans('cruds.user.fields.email')); ?></label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.email_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <label class="required" for="password"><?php echo e(trans('cruds.user.fields.password')); ?></label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.password_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('roles') ? 'has-error' : ''); ?>">
                            <label class="required" for="roles"><?php echo e(trans('cruds.user.fields.roles')); ?></label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(in_array($id, old('roles', [])) ? 'selected' : ''); ?>><?php echo e($role); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('roles')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('roles')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.roles_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('team') ? 'has-error' : ''); ?>">
                            <label for="team_id"><?php echo e(trans('cruds.user.fields.team')); ?></label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('team_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('team')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('team')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.user.fields.team_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/users/create.blade.php ENDPATH**/ ?>