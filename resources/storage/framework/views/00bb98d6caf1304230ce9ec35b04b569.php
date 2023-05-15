<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="<?php echo e($settings1['column_class']); ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                    <i class="fa fa-chart-line"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo e($settings1['chart_title']); ?></span>
                                    <span class="info-box-number"><?php echo e(number_format($settings1['total_number'])); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="<?php echo e($settings2['column_class']); ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                    <i class="fa fa-chart-line"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo e($settings2['chart_title']); ?></span>
                                    <span class="info-box-number"><?php echo e(number_format($settings2['total_number'])); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="<?php echo e($settings3['column_class']); ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                    <i class="fa fa-chart-line"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo e($settings3['chart_title']); ?></span>
                                    <span class="info-box-number"><?php echo e(number_format($settings3['total_number'])); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="<?php echo e($settings4['column_class']); ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                    <i class="fa fa-chart-line"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo e($settings4['chart_title']); ?></span>
                                    <span class="info-box-number"><?php echo e(number_format($settings4['total_number'])); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="<?php echo e($chart5->options['column_class']); ?>">
                            <h3><?php echo $chart5->options['chart_title']; ?></h3>
                            <?php echo $chart5->renderHtml(); ?>

                        </div>
                        <div class="<?php echo e($chart6->options['column_class']); ?>">
                            <h3><?php echo $chart6->options['chart_title']; ?></h3>
                            <?php echo $chart6->renderHtml(); ?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php echo $chart5->renderJs(); ?>

<?php echo $chart6->renderJs(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/home.blade.php ENDPATH**/ ?>