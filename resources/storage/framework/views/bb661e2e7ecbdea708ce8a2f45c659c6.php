<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.user.title')); ?>

                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.users.index')); ?>">
                                <?php echo e(trans('global.back_to_list')); ?>

                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.user.fields.id')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($user->id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.user.fields.name')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($user->name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.user.fields.email')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($user->email); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.user.fields.email_verified_at')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($user->email_verified_at); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.user.fields.roles')); ?>

                                    </th>
                                    <td>
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="label label-info"><?php echo e($roles->title); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.users.index')); ?>">
                                <?php echo e(trans('global.back_to_list')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.relatedData')); ?>

                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#assigned_to_tasks" aria-controls="assigned_to_tasks" role="tab" data-toggle="tab">
                            <?php echo e(trans('cruds.task.title')); ?>

                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#user_check_ins" aria-controls="user_check_ins" role="tab" data-toggle="tab">
                            <?php echo e(trans('cruds.checkIn.title')); ?>

                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#user_user_alerts" aria-controls="user_user_alerts" role="tab" data-toggle="tab">
                            <?php echo e(trans('cruds.userAlert.title')); ?>

                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="assigned_to_tasks">
                        <?php if ($__env->exists('admin.users.relationships.assignedToTasks', ['tasks' => $user->assignedToTasks])) echo $__env->make('admin.users.relationships.assignedToTasks', ['tasks' => $user->assignedToTasks], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="user_check_ins">
                        <?php if ($__env->exists('admin.users.relationships.userCheckIns', ['checkIns' => $user->userCheckIns])) echo $__env->make('admin.users.relationships.userCheckIns', ['checkIns' => $user->userCheckIns], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="user_user_alerts">
                        <?php if ($__env->exists('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])) echo $__env->make('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/users/show.blade.php ENDPATH**/ ?>