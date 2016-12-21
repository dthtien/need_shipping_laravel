<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"> <?php echo e(Auth::user()->name); ?></div>

                <div class="panel-body">
                    <?php echo e(Html::image('ns/images/logo1.png')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>