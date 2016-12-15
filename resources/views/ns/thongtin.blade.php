							@extends('ns.master')
							@section('content')
						<?php
						ob_start(); 
						?>
						<style type="text/css">
							#btn
							{
								padding-left: 12px;
								padding-right: 12px;
								width: 360px;
								height: 58px;
								background-color: #D93030;
							}
						</style>
						<script>
							function hien()
							{
								if(document.getElementById("btn").style.display=='none')
								{
									document.getElementById("btn").style.display='';
									document.getElementById("show").readOnly=false;
									document.getElementById("show1").readOnly=false;
									document.getElementById("show3").readOnly=false;
									document.getElementById("show4").readOnly=false;
									// document.getElementById("show").style.display==none;
								}
							}
							</script>
							<div id="frmtt" class="s5h-userform">
								<div class="s5h-uformbox">
									<div class="s5h-uform">
										<form action="{!! route('postcapnhat') !!}" method="post">
										<input name="_token" type="hidden" value="{{ csrf_token() }}">
										<!-- php -->
										@if(count($errors) > 0)
							                <div class="alert alert-danger">
							                    <ul>
							                        @foreach ($errors->all() as $error)
							                        <li> {{ $error }} </li>
							                        @endforeach
							                    </ul>
							                </div>
							                @endif
							                 @if(Session::has('tb'))
							                    <div class="alert alert-success">
							                        {!! Session::get('tb') !!}
							                    </div>
							                   <?php Session::forget('tb') ?>
							                @endif
							                 @if(Session::has('loi'))
							                    <div class="alert alert-danger">
							                        {!! Session::get('loi') !!}
							                    </div>
							                   <?php Session::forget('loi') ?>
							                @endif
											<div class="form-group has-feedback">
												<p class="s5h-uform-title">Họ tên:</p>
													<input type="text" id="show" class="form-control" style="" title="Click để chỉnh sửa thông tin" onclick="hien()" name="Name" value="{{ Auth::user()->name }}" readonly required>
												</div>
												<div class="form-group has-feedback">
													<p class="s5h-uform-title">Số Điện Thoại:</p>
														<input type="text" id="show1" title="Click để chỉnh sửa thông tin" class="form-control" onclick="hien()" name="Phone" value="{{ Auth::user()->sdt }}" readonly required>
													</div>
													<div class="form-group has-feedback">
														<p class="s5h-uform-title">Email: </p>
															<input type="email" class="form-control" title="Click để chỉnh sửa thông tin" onclick="hien()"  name="Email" value="{{ Auth::user()->email }}" readonly required>
														</div>
														<div class="form-group has-feedback">
															<p class="s5h-uform-title">Địa chỉ: </p>
																<input type="text" class="form-control" title="Click để chỉnh sửa thông tin" id="show3" onclick="hien()"  name="Address" value="{{ Auth::user()->diachi }}" readonly required>
															</div>
															<div class="form-group has-feedback">
															<p class="s5h-uform-title">Bạn là: </p>
																<input type="text" class="form-control" title="Click để chỉnh sửa thông tin" id="show4" onclick="hien()"  name="TypeAcc" value="{{ Auth::user()->loai }}" readonly required>
															</div>
															<p class="s5h-uform-forgetpass">
                    										<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal" title="Click để đổi mật khẩu"><i>Đổi mật khẩu?<i></a>
                											</p>
															<button id="btn" name="btnluu" style="display: none;" type="submit" class="btn btn-info btn-lg">Lưu</button>
														</form>
															<!-- Modal -->
															<div id="myModal" class="modal fade" role="dialog">
															  <div class="modal-dialog">
															  <form class="form-horizontal" action="{!! route('postcapnhatmatkhau') !!}" method="post">
															  <input name="_token" type="hidden" value="{{ csrf_token() }}">
															    <!-- Modal content-->
															    <div class="modal-content">
															      <div class="modal-header">
															        <button type="button" class="close" data-dismiss="modal">&times;</button>
															        <h4 class="modal-title" style="text-align: center; font-weight: bold; font-size: 20px; color: #4e4d55;">Đổi mật khẩu</h4>
															      </div>
															      <div class="modal-body">
															     <div class="row">
														            <div class="col-xs-12">
														                <div class="form-group">
														                    <label class="col-sm-3 control-label no-padding-right" ">Mật khẩu hiện tại:</label>
														                    <div class="col-sm-9" style="position:relative;">
														                        <input name="oldPassword" placeholder="Mật khẩu hiện tại"  class="form-control" type="password" required>
														                    </div>
														                </div>
														                <div class="form-group">
														                    <label class="col-sm-3 control-label no-padding-right" for="newpassword">Mật khẩu mới:</label>
														                    <div class="col-sm-9">
														                        <input name="newpassword" id="newPassword" placeholder="Mật khẩu" class="form-control" type="password" required>
														                    </div>
														                </div>
														                <div class="form-group">
														                    <label class="col-sm-3 control-label no-padding-right" for="renewpassword">Nhập lại mật khẩu mới:</label>
														                    <div class="col-sm-9">
														                        <input name="cofnewPassword" placeholder="Nhập lại mật khẩu" class="form-control" type="password" required>
														                    </div>
														                </div>
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
															            Đổi mật khẩu
															        </button>
															    </div>
															  </div>
															  </form>
															</div>
														<!-- end modal -->
													</div>
												</div>
											</div>
							<?php ob_flush(); ?>
							@stop