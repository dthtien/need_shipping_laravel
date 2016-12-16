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
</style>
<!--Nội dung-->
<div class="main-container">
	<div class="container">
		<div class="row">

			<!--<div style="text-align: center;">-->
			<div class="term-content">
				<div id="accordion" class="" role="tablist">
					<h3 style="background-color: #F24738; border: none; text-align: center; color: white; padding: 10px; font-size: 12px;" role="tab" id="ui-id-1" >
						Danh sách đơn hàng đã đăng.
					</h3>
					@foreach ($data as $row)
					<div class="text-background feed" style=" margin-top: 25px; margin-bottom: 10px;">
						<table class="table table-condensed user-info">
							<tbody>
								<tr>
									<td>
										<p style="font-size: 13px"><i>Ngày: {{ $row["updated_at"] }}</i></p>
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
									<th>Được nhận bởi:</th>
									<td>
										<?php
										$data2=App\XNDonHang::where('dh_id','=',$row["id"])->get()->toArray();
										if(count($data2)>0)
										{
											foreach($data2 as $row1)
											{
												$ship=App\User::where('id','=',$row1["ship_id"])->get()->toArray();
												?>
												<p style="cursor: pointer; text-decoration: none; color:#F24738; font-size: 18px;" class="" data-toggle="modal" data-target="#modal{{ $ship[0]['id'] }}">{{ $ship[0]["name"]}}
												</p>
												@if($row1["is_su"]==1)
												(<i style="color: green;">Đã giao hàng</i>)
												@endif
												<!-- Modal -->
												<div id="modal{{$ship[0]['id'] }}" class="modal fade" role="dialog">
													<div class="modal-dialog">
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header" style="background-color:#F24738; color: white;">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 style=" font-size: 20px;">{{ $ship[0]["name"] }}</h4>
															</div>
															<div class="modal-body" style="font-size: 18px; color: #4e4d55;text-align: left;">
																<table class="table table-condensed user-info">
																	<tbody>
																		<tr>
																			<th>Email: </th>
																			<td>{{ $ship[0]["email"] }}</td>
																		</tr>
																		<tr>
																			<th> Số điện thoại </th>
																			<td> {{ $ship[0]["sdt"] }}</td>
																		</tr>
																		<tr>
																			<th>Địa chỉ:</th>
																			<td>{{ $ship[0]["diachi"] }}</td>
																		</tr>
																		<tr>
																			<th>Nghề:</th>
																			<td>{{ $ship[0]["loai"] }}</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<!-- endmodal -->
												<?php				
											}
										}
										else { echo "<p style='color:red'>Chưa có người nhận</p>";}
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					@endforeach	
					<!-- <div class="center"> -->
					{{ $data->links() }}
					<!-- </div>			 -->
				</div>
			</div>
		</div>
	</div>
</div>
<!--footer-->
@stop