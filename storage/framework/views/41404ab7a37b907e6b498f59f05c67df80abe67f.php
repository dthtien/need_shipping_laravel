<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Baidang</div>
                    <div class="panel-body">

                        <a href="<?php echo e(url('/admin/bai-dang/create')); ?>" class="btn btn-primary btn-xs" title="Add New BaiDang"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Diachishop </th><th> Sdtshop </th><th> Diachinnhan </th><th> TenNguoiNhan </th>
                                        <th>TenMatHang</th><th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $baidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->diachishop); ?></td><td><?php echo e($item->sdtshop); ?></td><td><?php echo e($item->diachinnhan); ?></td><td> <?php echo e($item->ghichu); ?></td>
                                        <td><?php echo e($item->tenmathang); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admin/bai-dang/' . $item->id)); ?>" class="btn btn-success btn-xs" title="View BaiDang"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="<?php echo e(url('/admin/bai-dang/' . $item->id . '/edit')); ?>" class="btn btn-primary btn-xs" title="Edit BaiDang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            <?php echo Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/bai-dang', $item->id],
                                                'style' => 'display:inline'
                                            ]); ?>

                                                <?php echo Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete BaiDang" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete BaiDang',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $baidang->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>