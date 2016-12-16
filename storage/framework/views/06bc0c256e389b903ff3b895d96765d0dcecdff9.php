<div class="col-md-3">

    <?php $__currentLoopData = $laravelAdminMenus->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if($section->items): ?>
            <div class="panel panel-default panel-flush">
                <div class="panel-heading">
                    <?php echo e($section->section); ?>

                </div>

                <div class="panel-body">
                    <ul class="nav" role="tablist">
                        <?php $__currentLoopData = $section->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li role="presentation">
                                <a href="<?php echo e(url($menu->url)); ?>">
                                    <?php echo e($menu->title); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
