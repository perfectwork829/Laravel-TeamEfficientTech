<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.auditLog.title_singular')); ?> <?php echo e(trans('global.list')); ?>

                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AuditLog">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.auditLog.fields.id')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.auditLog.fields.description')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.auditLog.fields.subject_id')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.auditLog.fields.subject_type')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.auditLog.fields.user_id')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.auditLog.fields.host')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.auditLog.fields.created_at')); ?>

                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $auditLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $auditLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-entry-id="<?php echo e($auditLog->id); ?>">
                                        <td>

                                        </td>
                                        <td>
                                            <?php echo e($auditLog->id ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($auditLog->description ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($auditLog->subject_id ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($auditLog->subject_type ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($auditLog->user_id ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($auditLog->host ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($auditLog->created_at ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit_log_show')): ?>
                                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.audit-logs.show', $auditLog->id)); ?>">
                                                    <?php echo e(trans('global.view')); ?>

                                                </a>
                                            <?php endif; ?>



                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AuditLog:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/auditLogs/index.blade.php ENDPATH**/ ?>