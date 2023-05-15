<!-- resources/views/components/time-entry-buttons.blade.php -->

<?php
    $now = now();
    $user = auth()->user();
    $todayEntry = $user->timeEntries()->whereDate('start_time', $now->toDateString())->first();
    $isClockedIn = $todayEntry && !$todayEntry->end_time;
    $isOnLunch = $todayEntry && $todayEntry->lunch_start && !$todayEntry->lunch_end;
?>

<?php if(!$todayEntry): ?>
    <form method="POST" action="<?php echo e(route('admin.time-entries.store')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="start_time" value="<?php echo e($now->format('m/d/Y H:i:s')); ?>">
        
        <button type="submit" class="btn btn-primary">
            Clock In
        </button>
    </form>
<?php endif; ?>

<?php if(!$isClockedIn && !$isOnLunch && $todayEntry && !$todayEntry->lunch_end): ?>
    <form method="POST" action="<?php echo e(route('admin.time-entries.store')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="start_time" value="<?php echo e($now->format('m/d/Y H:i:s')); ?>">
        
        <button type="submit" class="btn btn-primary">
            Clock In
        </button>
    </form>
<?php endif; ?>

<?php if($isClockedIn && !$isOnLunch && $todayEntry && !$todayEntry->lunch_end): ?>
    <form method="POST" action="<?php echo e(route('admin.time-entries.update', $todayEntry)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="end_time" value="<?php echo e($now->format('m/d/Y H:i:s')); ?>">
        <label for="notes">Clock Out Notes:</label>
        <textarea class="form-control" id="notes" name="notes"></textarea>
        <button type="submit" class="btn btn-primary">
            Clock Out
        </button>
    </form>
    <form method="POST" action="<?php echo e(route('admin.time-entries.update', $todayEntry)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="lunch_start" value="<?php echo e($now->format('m/d/Y H:i:s')); ?>">
        <button type="submit" class="btn btn-primary">
            Go to Lunch
        </button>
    </form>
<?php endif; ?>

<?php if($isOnLunch && $todayEntry && !$todayEntry->end_time): ?>
    <form method="POST" action="<?php echo e(route('admin.time-entries.update', $todayEntry)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="lunch_end" value="<?php echo e($now->format('m/d/Y H:i:s')); ?>">
        <button type="submit" class="btn btn-primary">
            Back From Lunch
        </button>
    </form>
<?php endif; ?>

<?php if($isClockedIn && $todayEntry && $todayEntry->lunch_end): ?>
    <form method="POST" action="<?php echo e(route('admin.time-entries.update', $todayEntry)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="end_time" value="<?php echo e($now->format('m/d/Y H:i:s')); ?>">
        <div class="form-group">
            <label for="notes">Clock Out Notes:</label>
            <textarea class="form-control" id="notes" name="notes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            Clock Out
        </button>
    </form>
<?php endif; ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/components/time-entry-buttons.blade.php ENDPATH**/ ?>