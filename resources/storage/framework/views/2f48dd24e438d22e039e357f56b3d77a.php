<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.employee.title')); ?>

                </div>
                <ul>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('admin.employees.show', ['employee' => $user->id])); ?>"><?php echo e($user->name); ?></a>

        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
                <div class="panel-body">
<!-- Include Leaflet.js and CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>

<!-- Create a div for the map -->
<div id="mapid" style="height: 500px;"></div>

<!-- Add script to create the map and add markers -->
<script>
    // Create the map with initial center and zoom level
    var mymap = L.map('mapid').setView([41.8781, -87.6298], 8);

    // Add the tile layer (map background)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(mymap);

    // Loop through the markers and add a marker for each one
    <?php $__currentLoopData = $markers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        L.marker([<?php echo e($marker['lat']); ?>, <?php echo e($marker['lon']); ?>])
            .bindPopup("<b><?php echo e($marker['user']); ?></b><br>Last seen: <?php echo e($marker['last_seen']); ?>")
            .addTo(mymap);
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</script>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/employees/index.blade.php ENDPATH**/ ?>