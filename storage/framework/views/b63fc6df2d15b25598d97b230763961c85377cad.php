<?php $__env->startSection('content'); ?>
<?php 
ob_start();
 ?>
  <div class="s5h-userform">
    <div class="s5h-uformbox">
        <div class="s5h-uform">
            <form action="<?php echo route('postTaodonhang'); ?>" method="post" name="formtaodonhang">
             <input type="hidden"  name="_token" value="<?php echo e(csrf_token()); ?>">
               <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(Session::has('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo Session::get('thongbao'); ?>

                    </div>
                <?php endif; ?>
                <div class="form-group has-feedback">
                    <h4 class="s5h-uform-title">Thông tin shop</h4>
                    <input type="text" class="form-control" name="ShopAddress" id="add_autocomplete" autocomplete="off" placeholder="Số nhà,Đường,Quận,TP(tỉnh)" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="ShopPhone" id="Phone" class="form-control" placeholder="Số điện thoại" required>
                </div>
                <div>
                    <h5 class="s5h-uform-title">Thông tin người nhận</h5>
                    <input type="text" class="form-control" name="RecAddress" id="add_autocomplete" autocomplete="off" placeholder="Số nhà,Đường,Quận,TP(tỉnh)" required>
                    <br>
                </div>
                <div class="form-group has-feedback">
                 <input type="text" name="RecPhone" id="Phone" class="form-control" placeholder="Số điện thoại" required>
             </div>
             <div class="form-group has-feedback">
                 <input type="text" class="form-control" name="Note" id="add_autocomplete" autocomplete="off" placeholder="Tên người nhận" required>
             </div>
             <div class="form-group has-feedback">
                 <h6 class="s5h-uform-title">Thông tin hàng hóa</h6>
                 <input type="text" class="form-control" name="NameGoods" id="add_autocomplete" autocomplete="off" placeholder="Tên mặt hàng" required>
             </div>
             <div class="form-group has-feedback">
                <input type="text" class="form-control" name="Number" placeholder="Cân nặng của gói hàng" required>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="Deposit" placeholder="Tiền cọc" required>
            </div>
            <div class="form-group has-feedback ">
                <input type="text" class="form-control" name="ShipMoney" placeholder="Phí ship" required>
            </div>

            <button name="btnDang" type="submit" class="btn btn-info btn-lg" style="padding-left: 12px;padding-right: 12px;width: 360px;height: 58px;background-color: #D93030;">Đăng</button>
            <p>&nbsp;</p>
        </form>
    </div>
</div>
</div>
<?php ob_flush(); ?>
<!-- Js -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ns.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>