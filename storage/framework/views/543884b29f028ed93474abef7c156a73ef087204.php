<?php $__env->startSection('content'); ?>
<style type="text/css">
	.user-info th {
		width: 35%;
	}
	.user-info tr:first-child td {
		border-top:0px;
	}
	ul.pagination {
		display: inline-block;
		padding: 0;
		margin: 0;
	}

	ul.pagination {
		display: inline-block;
		padding: 0;
		margin: 0;
	}

	ul.pagination li {display: inline;}

	ul.pagination li a {
		color: black;
		float: left;
		padding: 8px 16px;
		text-decoration: none;
		transition: background-color .3s;
		border: 1px solid #ddd;
		margin: 0 4px;
	}

	ul.pagination li a.active {
		background-color: #4CAF50;
		color: white;
		border: 1px solid #4CAF50;
	}

	ul.pagination li a:hover:not(.active) {background-color: #ddd;}

	div.center {text-align: center;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
<!--Nội dung-->
<div class="main-container">
	<div class="container">
		<div class="row">

			<!--<div style="text-align: center;">-->
			<div class="term-content">
				<div id="accordion" class="" role="tablist">
					<h3 style="background-color: #F24738; border: none; text-align: center; color: white; padding: 10px; font-size: 12px;" role="tab" id="ui-id-1" >
						Danh sách đơn hàng.
					</h3>
				<?php if(Session::has('loi')): ?>
                    <div class="alert alert-danger">
                    <span class="closebtn">&times;</span>  
                        <?php echo Session::get('loi'); ?>

                    </div>
                    <?php Session::forget('loi') ?>
                <?php endif; ?>
                <?php if(Session::has('tb')): ?>
                    <div class="alert alert-success">
                    <span class="closebtn">&times;</span>  
                        <?php echo Session::get('tb'); ?>

                    </div>
                    <?php Session::forget('tb') ?>
                  <?php endif; ?>
				</div>
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<div class="text-background feed" style=" margin-top: 25px; margin-bottom: 10px;">
					<h3>
						<?php 
						$data1=App\BaiDang::find($row["id"])->user()->get()->toArray();
						 ?>
						<!-- Lấy thông tin người đăng-->
						<?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<!-- Modal -->
						<div id="modal<?php echo e($row1['id']); ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header" style="background-color:#F24738; color: white;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 style=" font-size: 20px;"><?php echo e($row1["name"]); ?></h4>
									</div>
									<div class="modal-body" style="font-size: 18px; color: #4e4d55;text-align: left;">
										<table class="table table-condensed user-info">
											<tbody><tr>
												<th>Email: </th>
												<td><?php echo e($row1["email"]); ?></td>
											</tr>
											<tr>
												<th>Số điện thoại </th>
												<td><?php echo e($row1["sdt"]); ?></td>
											</tr>
											<tr>
												<th>Địa chỉ:</th>
												<td><?php echo e($row1["diachi"]); ?></td>
											</tr>
											<tr>
												<th>Nghề</th>
												<td><?php echo e($row1["loai"]); ?></td>
											</tr>
											<tr>
												<th>Số bài đăng:</th>
												<td>
													<?php 
													$data2=App\User::find($row1["id"])->baidang()->count();
													print_r($data2);
													 ?>
													<!--Tính số bài đăng mà shop đã đăng-->
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						</div>
						<!-- endmodal -->
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</h3>
					<br>
					<table class="table table-condensed user-info">
						<tbody>
							<tr>
								<td>
									<p style="cursor: pointer; text-decoration: none; color:#F24738; font-size: 18px; font-weight: bold;" class="" data-toggle="modal" data-target="#modal<?php echo e($row1['id']); ?>"><?php echo e($row1["name"]); ?></p>
									<p style="font-size: 13px"><i>Ngày: <?php echo e($row["updated_at"]); ?></i></p>
									<?php
									$kc=App\Helpers::calculated_distance(Auth::user()->kinhdo,Auth::user()->vido,$row["kinhdoshop"],$row["vidoshop"],$earthRadius = 6371);
									if($kc>1000) $kc=0;
									?>
								</td>
							</tr>
							<tr>
								<th> Địa chỉ lấy hàng </th>
								<td> <?php echo e($row["diachishop"]); ?> 
								<?php if($kc>0): ?>
								 (<i class='fa fa-map-marker' style='color:#F24738; cursor:pointer;' title='Khoảng cách từ bạn đến địa chỉ nhận hàng'> <?php echo e($kc); ?>  km</i>)
								 <?php endif; ?>
								 </td>
							</tr>
							<tr>
								<th> Số điện thoại lấy hàng </th>
								<td> <?php echo e($row["sdtshop"]); ?> </td>
							</tr>
							<tr>
								<th> Địa chỉ nhận hàng </th>
								<td> <?php echo e($row["diachinnhan"]); ?> </td>
							</tr>
							<tr >
								<th>Số điện thoại nhận hàng</th>
								<td> <?php echo e($row["sdtnnhan"]); ?> </td>
							</tr>
							<tr>
								<th>Tên người nhận:</th>
								<td> <?php echo e($row["ghichu"]); ?> </td>
							</tr>
							<tr>
								<th> Tên mặt hàng </th>
								<td> <?php echo e($row["tenmathang"]); ?> </td>
							</tr>
							<tr>
								<th>Khối lượng:</th>
								<td> <?php echo e($row["cannang"]); ?> </td>
							</tr>
							<tr>
								<th>Tiền ứng:</th>
								<td> <?php echo e($row["tienung"]); ?> </td>
							</tr>
							<tr>
								<th>Phí ship:</th>
								<td> <?php echo e($row["phiship"]); ?> </td>
							</tr>
							<tr>
								<th>Khoảng cách(Từ shop đến chỗ nhận):</th>
								<td>
									<?php echo e($row["khoangcach"]); ?> km
								</td>
							</tr>
							<tr>
								<th><p style="cursor: pointer; text-decoration: none; color:#F24738; font-size: 18px; font-weight: bold;" class="" data-toggle="modal" data-target="#mymodal<?php echo e($row['id']); ?>"><i class="fa fa-check-square-o"> Nhận ngay </i></p></th>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- Modal -->
				<div id="mymodal<?php echo e($row['id']); ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<form class="form-horizontal" action="<?php echo route('postxacnhandh'); ?>" method="post">
							<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align: center; font-weight: bold; font-size: 20px; color: #4e4d55;">Xác nhận</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" ">Tên mặt hàng:</label>
												<div class="col-sm-9" style="position:relative;">
													<input name="tenmathang" style="border: none;"  class="form-control" type="text" readonly value="<?php echo e($row['tenmathang']); ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Địa chỉ shop:</label>
												<div class="col-sm-9">
													<input name="diachishop" style="border: none;" class="form-control" type="text" value="<?php echo e($row['diachishop']); ?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Số điện thoại shop:</label>
												<div class="col-sm-9">
													<input name="sdtshop" style="border: none;" class="form-control" type="text" value="<?php echo e($row['sdtshop']); ?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Địa chỉ nhận:</label>
												<div class="col-sm-9">
													<input name="diachinnhan" style="border: none;" class="form-control" type="text" value="<?php echo e($row['diachinnhan']); ?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Số điện thoại người nhận:</label>
												<div class="col-sm-9">
													<input name="sdtnnhan" style="border: none;" class="form-control" type="text" value="<?php echo e($row['sdtnnhan']); ?>" readonly>
												</div>
											</div>
											<input type="hidden" name="dh_id" value="<?php echo e($row['id']); ?>">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-sm" data-dismiss="modal">
										<i class="ace-icon fa fa-times"></i>
										Đóng
									</button>
									<button class="btn btn-sm btn-primary" type="submit">
										<i class="ace-icon fa fa-check"></i>
										Nhận đơn hàng
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- end modal -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>	
				<!-- <div class="center"> -->
				<?php echo e($data->links()); ?>

				<!-- </div>			 -->
			</div>
		</div>
	</div>
</div>
</div>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 60);
    }
}
</script>
<!--footer-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ns.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>