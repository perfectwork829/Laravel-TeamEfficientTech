<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.expense.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.expenses.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('expense_category') ? 'has-error' : ''); ?>">
                            <label for="expense_category_id"><?php echo e(trans('cruds.expense.fields.expense_category')); ?></label>
                            <select class="form-control select2" name="expense_category_id" id="expense_category_id">
                                <?php $__currentLoopData = $expense_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('expense_category_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('expense_category')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('expense_category')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.expense.fields.expense_category_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('entry_date') ? 'has-error' : ''); ?>">
                            <label class="required" for="entry_date"><?php echo e(trans('cruds.expense.fields.entry_date')); ?></label>
                            <input class="form-control date" type="text" name="entry_date" id="entry_date" value="<?php echo e(old('entry_date')); ?>" required>
                            <?php if($errors->has('entry_date')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('entry_date')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.expense.fields.entry_date_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
                            <label class="required" for="amount"><?php echo e(trans('cruds.expense.fields.amount')); ?></label>
                            <input class="form-control" type="number" name="amount" id="amount" value="<?php echo e(old('amount', '')); ?>" step="0.01" required>
                            <?php if($errors->has('amount')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('amount')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.expense.fields.amount_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('mileage') ? 'has-error' : ''); ?>">
                            <label for="mileage"><?php echo e(trans('cruds.expense.fields.mileage')); ?></label>
                            <input class="form-control" type="number" name="mileage" id="mileage" value="<?php echo e(old('mileage', '')); ?>" step="1">
                            <?php if($errors->has('mileage')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('mileage')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.expense.fields.mileage_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                            <label for="description"><?php echo e(trans('cruds.expense.fields.description')); ?></label>
                            <input class="form-control" type="text" name="description" id="description" value="<?php echo e(old('description', '')); ?>">
                            <?php if($errors->has('description')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('description')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.expense.fields.description_helper')); ?></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                <?php echo e(trans('global.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/admin/expenses/create.blade.php ENDPATH**/ ?>