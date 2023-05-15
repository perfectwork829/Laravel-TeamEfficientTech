<script>
    var ctx = document.getElementById("<?php echo e($options['chart_name'] ?? 'myChart'); ?>");
    var <?php echo e($options['chart_name'] ?? 'myChart'); ?> = new Chart(ctx, {
        type: '<?php echo e($options['chart_type'] ?? 'line'); ?>',
        data: {
            labels: [
                <?php if(count($datasets) > 0): ?>
                    <?php $__currentLoopData = $datasets[0]['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        "<?php echo e($group); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            ],
        datasets: [
            <?php $__currentLoopData = $datasets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                label: '<?php echo e($dataset['name'] ?? $options['chart_title']); ?>',
                data: [
                    <?php $__currentLoopData = $dataset['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $result; ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                <?php if($options['chart_type'] == 'line'): ?>
                    <?php if(isset($dataset['fill']) && $dataset['fill'] != ''): ?>
                        fill: '<?php echo e($dataset['fill']); ?>',
                    <?php else: ?>
                        fill: false,
                    <?php endif; ?>
                    <?php if(isset($dataset['color']) && $dataset['color'] != ''): ?>
                        borderColor: '<?php echo e($dataset['color']); ?>',
                    <?php elseif(isset($dataset['chart_color']) && $dataset['chart_color'] != ''): ?>
                        borderColor: 'rgba(<?php echo e($dataset['chart_color']); ?>)',
                    <?php else: ?>
                        borderColor: 'rgba(<?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, 0.2)',
                    <?php endif; ?>
                <?php elseif($options['chart_type'] == 'pie'): ?>
                    backgroundColor: [
                        <?php $__currentLoopData = $dataset['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            'rgba(<?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, <?php echo e(rand(0,255)); ?>, 0.2)',
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                <?php elseif($options['chart_type'] == 'bar' && isset($dataset['chart_color']) && $dataset['chart_color'] != ''): ?>
                    borderColor: 'rgba(<?php echo e($dataset['chart_color']); ?>)',
                    backgroundColor: 'rgba(<?php echo e($dataset['chart_color']); ?>, .2)',
                <?php endif; ?>
                borderWidth: 2
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]
    },
    options: {
        tooltips: {
            mode: 'point'
        },
        height: '<?php echo e($options['chart_height'] ?? "300px"); ?>',
        <?php if($options['chart_type'] != 'pie'): ?>
            scales: {
                xAxes: [],
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
        <?php endif; ?>
    }
    });
</script>
<?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/vendor/laraveldaily/laravel-charts/src/views/javascript.blade.php ENDPATH**/ ?>