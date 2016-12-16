<?php 
ob_start();
?>


<?php $__env->startSection('content'); ?>
<!-- <script type="text/javascript">
 function hien() {
  document.getElementById("LicenseMoto").innerHTML="<input type='text' name='LicenseMoto' class='form-control' placeholder='Biển số xe'>";    
}
function dong() {
  document.getElementById("LicenseMoto").innerHTML="";    
}
</script> -->
<div class="s5h-userform">
    <div class="s5h-uformbox">
        <div class="s5h-uform">
            <form class="s5h-uform-login" id="f-register" method="post" action="<?php echo route('postdangky'); ?>" novalidate="novalidate">                
                <input type="hidden"  name="_token" value="<?php echo e(csrf_token()); ?>">
                <h3 class="s5h-uform-title">Đăng ký</h3>
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
            <div class="form-group has-feedback">
                <input type="text" name="Email" class="form-control" placeholder="Email" value="" required>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="Password" id="Password" class="form-control" placeholder="Mật khẩu" 
                value="" required>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="form-control" placeholder="Nhập lại mật khẩu" required>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="FullName" class="form-control" id="FullName" value="" placeholder="Họ tên"
                value="" required>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="Phone" id="Phone" class="form-control" placeholder="Số điện thoại"
                value="" required> 
            </div>
            <div>
                <input type="text" class="form-control" name="Address" id="add_autocomplete" autocomplete="off" value="" placeholder="Đường phố"
                value="" required>
                <br>
            </div>
            <br>
            <div class="form-group" style="margin-top:1px">
                <h6 class="s5h-uform-title" style="margin-bottom: 10px; margin-top:1px">Bạn là: </h6>
                <div class="register-radio">
                    <input type="radio" name="TypeAcc" value="Shop" onclick="dong()">
                    <label class="radio-shop" for="IsShop">Shop</label>
                </div>
                <div class="register-radio">
                    <input type="radio" name="TypeAcc" value="Shipper" onclick="hien()">
                    <label class="radio-ship" for="IsShipper">Shipper</label>
                </div>
            </div>
            <button type="submit" class="btn btn-default s5h-uform-btn" name="btndk">Đăng ký</button>
        </form>
    </div>
    <div class="s5h-uform-reg">
        <div class="s5h-uform-regbox">
            <h3 class="s5h-uform-regtit">Đăng nhập</h3>
            <p>Bạn đã có tài khoản ?</p>
            <p class="s5h-uform-regbtn">
                <a class="btn" href="<?php echo e(url('dangnhap')); ?>">Đăng nhập ngay</a>
            </p>
        </div>
    </div>
</div>
</div>
<?php ob_flush(); ?>
<!-- Js -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ns.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>