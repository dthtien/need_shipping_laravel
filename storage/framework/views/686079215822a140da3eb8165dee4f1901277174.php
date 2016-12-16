<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">BaiDang <?php echo e($baidang->id); ?></div>
                    <div class="panel-body">

                        <a href="<?php echo e(url('admin/bai-dang/' . $baidang->id . '/edit')); ?>" class="btn btn-primary btn-xs" title="Edit BaiDang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/baidang', $baidang->id],
                            'style' => 'display:inline'
                        ]); ?>

                            <?php echo Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete BaiDang',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )); ?>

                        <?php echo Form::close(); ?>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td><?php echo e($baidang->id); ?></td>
                                    </tr>
                                    <tr><th> Diachishop </th><td> <?php echo e($baidang->diachishop); ?> </td></tr><tr><th> Sdtshop </th><td> <?php echo e($baidang->sdtshop); ?> </td></tr><tr><th> Diachinnhan </th><td> <?php echo e($baidang->diachinnhan); ?> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>