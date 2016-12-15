@extends('ns.master')
@section('content')
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
						Danh sách đơn hàng đã nhận.
					</h3>
					@if(Session::has('tb'))
                    <div class="alert alert-success">
                    <span class="closebtn">&times;</span>  
                        {!! Session::get('tb') !!}
                    </div>
                    <?php Session::forget('tb') ?>
                  @endif
					<?php
					foreach ($data as $r) {
					$id = $r["id"]; 
					// $data_xn=BaiDang::findOrFail($id)->xndonhang()->get()->toArray();
					$data_xn=App\XNDonHang::findOrFail($id)->baidang()->get()->toArray();
					 ?>
				@foreach ($data_xn as $row)
				<div class="text-background feed" style=" margin-top: 25px; margin-bottom: 10px;">
					<h3>
						@php
						$data1=App\BaiDang::find($row["id"])->user()->get()->toArray();
						@endphp
						<!-- Lấy thông tin người đăng-->
						@foreach($data1 as $key => $row1)
						<!-- Modal -->
						<div id="modal{{ $row1['id'] }}" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header" style="background-color:#F24738; color: white;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 style=" font-size: 20px;">{{ $row1["name"] }}</h4>
									</div>
									<div class="modal-body" style="font-size: 18px; color: #4e4d55;text-align: left;">
										<table class="table table-condensed user-info">
											<tbody><tr>
												<th>Email: </th>
												<td>{{ $row1["email"] }}</td>
											</tr>
											<tr>
												<th>Số điện thoại </th>
												<td>{{ $row1["sdt"] }}</td>
											</tr>
											<tr>
												<th>Địa chỉ:</th>
												<td>{{ $row1["diachi"] }}</td>
											</tr>
											<tr>
												<th>Nghề</th>
												<td>{{ $row1["loai"] }}</td>
											</tr>
											<tr>
												<th>Số bài đăng:</th>
												<td>
													@php
													$data2=App\User::find($row1["id"])->baidang()->count();
													print_r($data2);
													@endphp
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
						@endforeach
					</h3>
					<br>
					<table class="table table-condensed user-info">
						<tbody>
							<tr>
								<td>
									<p style="cursor: pointer; text-decoration: none; color:#F24738; font-size: 18px; font-weight: bold;" class="" data-toggle="modal" data-target="#modal{{ $row1['id'] }}">{{ $row1["name"]}}</p>
									<p style="font-size: 13px"><i>Ngày: {{ $row["updated_at"] }}</i></p>
									@php
									$x1=Auth::user()->kinhdo;
									$y1=Auth::user()->vido;
									$x = abs($row["kinhdoshop"] - $x1);
									$y= abs($row["vidoshop"] - $y1);
									$kc=ceil(sqrt($x*$x+$y*$y)*111.18);
									echo "<i class='fa fa-map-marker' style='color:#F24738'> ".$kc."  km</i>";
									@endphp
								</td>
							</tr>
							<tr>
								<th> Địa chỉ lấy hàng </th>
								<td> {{ $row["diachishop"] }} </td>
							</tr>
							<tr>
								<th> Số điện thoại lấy hàng </th>
								<td> {{ $row["sdtshop"] }} </td>
							</tr>
							<tr>
								<th> Địa chỉ nhận hàng </th>
								<td> {{ $row["diachinnhan"] }} </td>
							</tr>
							<tr >
								<th>Số điện thoại nhận hàng</th>
								<td> {{ $row["sdtnnhan"] }} </td>
							</tr>
							<tr>
								<th>Tên người nhận:</th>
								<td> {{ $row["ghichu"] }} </td>
							</tr>
							<tr>
								<th> Tên mặt hàng </th>
								<td> {{ $row["tenmathang"] }} </td>
							</tr>
							<tr>
								<th>Khối lượng:</th>
								<td> {{ $row["cannang"] }} </td>
							</tr>
							<tr>
								<th>Tiền ứng:</th>
								<td> {{ $row["tienung"] }} </td>
							</tr>
							<tr>
								<th>Phí ship:</th>
								<td> {{ $row["phiship"] }} </td>
							</tr>
							<tr>
								<th>Khoảng cách(Từ shop đến chỗ nhận):</th>
								<td>
									{{ $row["khoangcach"] }} km
								</td>
							</tr>
							<tr>
								<th>
								<form method="post" action="{!! route('posthoanthanhdonhang') !!}" >
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="id" value="{{ $id }}">
								<button style="cursor: pointer; text-decoration: none; color:lightgreen; font-size: 18px; font-weight: bold; border: none; background-color:#fff;"><i class="fa fa-check-square-o"> Hoàn Thành </i></button>
								</form>
								<form method="post" action="{!! route('postxoadonhang') !!}" onSubmit="return confirm('Bạn có muốn xóa đơn hàng');">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="id" value="{{ $id }}">
								<button  style="cursor: pointer; text-decoration: none; color:red; font-size: 18px; font-weight: bold; border: none; background-color:#fff;"><i class="fa fa-times"> Xóa </i></button>
								</form>
								</th>
							</tr>
						</tbody>
					</table>
				</div>
				@endforeach	
				<?php
				} 
				 ?>
				<!-- <div class="center"> -->
				{{ $data->links() }}
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
@stop