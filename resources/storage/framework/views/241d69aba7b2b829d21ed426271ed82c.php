<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.timeWorkType.title')); ?>

                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.time-work-types.index')); ?>">
                                <?php echo e(trans('global.back_to_list')); ?>

                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeWorkType.fields.id')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeWorkType->id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.timeWorkType.fields.name')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($timeWorkType->name); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.time-work-types.index')); ?>">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/timeWorkTypes/show.blade.php ENDPATH**/ ?>