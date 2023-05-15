
<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.checkIn.title')); ?>

            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="<?php echo e(route('admin.check-ins.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.id')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->id); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.user')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->user->name ?? ''); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.type')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->type->check_in_type ?? ''); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.project')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->project->name ?? ''); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.check_in')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->check_in ?? ''); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.check_out')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->check_out ?? ''); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.work_type')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->work_type->name ?? ''); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.notes')); ?>

                                </th>
                                <td>
                                    <?php echo e($checkIn->notes ?? ''); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="<?php echo e(route('admin.check-ins.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/checkIns/show.blade.php ENDPATH**/ ?>