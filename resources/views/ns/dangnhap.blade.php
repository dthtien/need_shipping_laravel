<?php
ob_start();
//$r=$_SERVER['HTTP_REFERER'];
?>
  @extends('ns.master')
  @section('content')
  <div class="s5h-userform">
    <div class="s5h-uformbox">
        <div class="s5h-uform">

            <form class="s5h-uform-login" method="post" action="{!! route('postdangnhap') !!}" novalidate="novalidate">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <h3 class="s5h-uform-title">Đăng nhập</h3>
                 @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('loi'))
                    <div class="alert alert-danger">
                        {!! Session::get('loi') !!}
                    </div>
                    <?php Session::forget('loi') ?>
                @endif
                  @if(Session::has('tb'))
                    <div class="alert alert-success">
                        {!! Session::get('tb') !!}
                    </div>
                    <?php Session::forget('tb') ?>
                @endif
                <div class="form-group has-feedback">
                    <input type="text" name="Email" class="form-control" placeholder="Tài khoản" value="" required>
                    <span class="glyphicon s5h-gly-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="Password" class="form-control" placeholder="Mật khẩu" value="" required>
                    <label id="password-error" class="error" for="Password"></label>
                    <span class="glyphicon s5h-gly-pass form-control-feedback"></span>
                </div>
                <p class="s5h-uform-forgetpass">
                    <a href="javascript:;" title="">Quên mật khẩu?</a>
                </p>
                    <button type="submit" class="btn btn-default s5h-uform-btn s5h-uform-btn-login" name="btnDangNhap">
                        Đăng nhập
                    </button>
                </form>
            </div>

            <div class="s5h-uform-reg">
                <div class="s5h-uform-regbox">
                    <h3 class="s5h-uform-regtit">Đăng ký</h3>
                    <p>Tạo ngay tài khoản tại NeedShipping để trở thành một phần của cộng đồng vận chuyển lớn nhất Việt Nam </p>
                    <p class="s5h-uform-regbtn">
                        <a class="btn" href="{{ url('dangky') }}" title="Đăng ký ngay">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php ob_flush(); ?>
    @stop