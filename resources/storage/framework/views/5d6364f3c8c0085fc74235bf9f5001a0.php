<?php $__env->startSection('content'); ?>
<div class="content">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('check_in_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.check-ins.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.checkIn.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.checkIn.title_singular')); ?> <?php echo e(trans('global.list')); ?>

                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-CheckIn">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.id')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.user')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.type')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.project')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.check_in')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.checkIn.fields.check_out')); ?>

                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value><?php echo e(trans('global.all')); ?></option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value><?php echo e(trans('global.all')); ?></option>
                                        <?php $__currentLoopData = $check_in_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->check_in_type); ?>"><?php echo e($item->check_in_type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value><?php echo e(trans('global.all')); ?></option>
                                        <?php $__currentLoopData = $time_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('cruds.checkIn.fields.check_in')); ?>" strict>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('cruds.checkIn.fields.check_out')); ?>" strict>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('check_in_delete')): ?>
            let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.check-ins.massDestroy')); ?>",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

                        return
                    }

                    if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }
                        }).done(function () {
                            location.reload();
                        });
                    }
                }
            };
            dtButtons.push(deleteButton);
        <?php endif; ?>

        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "<?php echo e(route('admin.check-ins.index')); ?>",
            columns: [
                {data: 'placeholder', name: 'placeholder'},
                {data: 'id', name: 'id'},
                {data: 'user_name', name: 'user.name'},
                {data: 'type_check_in_type', name: 'type.check_in_type'},
                {data: 'project_name', name: 'project.name'},
                {data: 'check_in', name: 'check_in'},
                {data: 'check_out', name: 'check_out'},
                {data: 'actions', name: '<?php echo e(trans('global.actions')); ?>'},
            ],
            orderCellsTop: true,
            order: [[1, 'desc']],
            pageLength: 100,
        };

        let table = $('.datatable-CheckIn').DataTable(dtOverrideGlobals);

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        let visibleColumnsIndexes = null;

        $('.datatable thead').on('input', '.search', function () {
            let strict = $(this).attr('strict') || false;
            let value = strict && this.value ? "^" + this.value + "$" : this.value;

            let index = $(this).parent().index();
            if (visibleColumnsIndexes !== null) {
                index = visibleColumnsIndexes[index];
            }

            table
                .column(index)
                .search(value, strict)
                .draw();
        });

        table.on('column-visibility.dt', function(e, settings, column, state) {
            visibleColumnsIndexes = [];
            table.columns(":visible").every(function(colIdx) {
                visibleColumnsIndexes.push(colIdx);
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/checkIns/index.blade.php ENDPATH**/ ?>