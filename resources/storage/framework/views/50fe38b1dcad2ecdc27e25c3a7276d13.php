<?php $__env->startSection('content'); ?>
<div class="content">
    <h3 class="page-title"><?php echo e(trans('cruds.timeReport.reports.title')); ?></h3>

    <form method="get">
        <div class="row">
            <div class="col-xs-2 col-md-2 form-group">
                <label for='from' class='control-label'><?php echo e(trans('global.timeFrom')); ?></label>
                <input type="text" id="from" name="from" class="form-control date" value="<?php echo e(old('from', request()->get('from', date('Y-m-d')))); ?>">
            </div>
            <div class="col-xs-2 col-md-2 form-group">
                <label for='to' class='control-label'><?php echo e(trans('global.timeTo')); ?></label>
                <input type="text" id="to" name="to" class="form-control date" value="<?php echo e(old('to', request()->get('to', date('Y-m-d')))); ?>">
            </div>
            <div class="col-xs-4">
                <label class="control-label">&nbsp;</label><br>
                <button type="submit" class="btn btn-primary"><?php echo e(trans('global.filterDate')); ?></button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.timeReport.reports.timeEntriesReport')); ?>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th><?php echo e(trans('cruds.timeReport.reports.timeByProjects')); ?></th>
                                    <th></th>
                                </tr>
                                <?php $__currentLoopData = $projectTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($projectTime['name']); ?></th>
                                        <td><?php echo e(gmdate("d H:i:s", $projectTime['time'])); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th><?php echo e(trans('cruds.timeReport.reports.timeByWorkType')); ?></th>
                                    <th></th>
                                </tr>
                                <?php $__currentLoopData = $workTypeTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($workType['name']); ?></th>
                                        <td><?php echo e(gmdate("d H:i:s", $workType['time'])); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "<?php echo e(config('panel.date_format_js')); ?>"
      })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/timeReports/index.blade.php ENDPATH**/ ?>