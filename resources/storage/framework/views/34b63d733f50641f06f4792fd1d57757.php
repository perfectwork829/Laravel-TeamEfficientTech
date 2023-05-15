<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.timeEntry.title')); ?>

                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.time-entries.index')); ?>">
                                <?php echo e(trans('global.back_to_list')); ?>

                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeEntry.fields.id')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeEntry->id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeEntry.fields.work_type')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeEntry->work_type->name ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeEntry.fields.project')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeEntry->project->name ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeEntry.fields.start_time')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeEntry->start_time); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeEntry.fields.end_time')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeEntry->end_time); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeEntry.fields.notes')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeEntry->notes); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.time-entries.index')); ?>">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/timeEntries/show.blade.php ENDPATH**/ ?>