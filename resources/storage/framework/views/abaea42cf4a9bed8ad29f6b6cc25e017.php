
<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.userDashboard.title')); ?>

                </div>
                <div class="panel-body">
                    <h3>
                        Welcome to Team Efficient Tech!
</h3></br>
<h4>
                        What would you like to do today?
</h4>
<a href="https://app.teamefficienttech.com/admin/expenses/create" class="btn btn-primary">Log Miles/Expenses</a>
<p>&nbsp;</p>
<a href="https://app.teamefficienttech.com/admin/tasks" class="btn btn-primary">View My Schedule</a>
<p>&nbsp;</p>
<a href="https://app.teamefficienttech.com/admin/check-ins/create" class="btn btn-primary">Check Into A Site</a>
<p>&nbsp;</p>
<?php echo $__env->make('components.time-entry-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<p>&nbsp;</p>
<a href="https://app.teamefficienttech.com/admin/messenger/create" class="btn btn-primary">Send a Message</a>

                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/userDashboards/index.blade.php ENDPATH**/ ?>