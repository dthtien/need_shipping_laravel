<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Give Permission to Role</div>
                    <div class="panel-body">

                        <?php if($errors->any()): ?>
                            <ul class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <?php echo Form::open(['method' => 'POST', 'url' => ['/admin/give-role-permissions'], 'class' => 'form-horizontal']); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('name', 'Role: ', ['class' => 'col-md-4 control-label']); ?>

                            <div class="col-md-6">
                                <select class="roles form-control" id="role" name="role">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($role->name); ?>"><?php echo e($role->label); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                                <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('label') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('label', 'Permissions: ', ['class' => 'col-md-4 control-label']); ?>

                            <div class="col-md-6">
                                <select class="permissions form-control" id="permissions" name="permissions[]" multiple="multiple">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($permission->name); ?>"><?php echo e($permission->label); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                                <?php echo $errors->first('label', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                <?php echo Form::submit('Grant', ['class' => 'btn btn-primary']); ?>

                            </div>
                        </div>
                        <?php echo Form::close(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>