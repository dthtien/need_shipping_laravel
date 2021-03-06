<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">

                        <a href="<?php echo e(url('/admin/users/create')); ?>" class="btn btn-primary pull-right btn-sm">Add New User</a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Email</th><th>DiaChi</th><th>Loai</th><th>Level</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><a href="<?php echo e(url('/admin/users', $item->id)); ?>"><?php echo e($item->name); ?></a></td><td><?php echo e($item->email); ?></td><td><?php echo e($item->diachi); ?></td><td><?php echo e($item->loai); ?></td><td><?php echo e($item->level); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admin/users/' . $item->id . '/edit')); ?>">
                                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                            </a> /
                                            <?php echo Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/users', $item->id],
                                                'style' => 'display:inline'
                                            ]); ?>

                                                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination"> <?php echo $users->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>