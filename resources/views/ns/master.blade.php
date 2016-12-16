<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Need-Shipping Ship tìm người, Người tìm ship</title>

    <meta name="title" content="Need-Shipping Ship tìm người, Người tìm ship">
    <meta name="description" content="Need-Shipping cộng đồng ship tìm người - người tìm ship">
    <meta name="keywords" content="tìm shipper, cần shipper, cần ship, vận chuyển nhanh, vận chuyển">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <meta name="google-site-verification" content="DT93bXLXI0Z780b1OTJ0lpChQRka5556aGwP7R7i2xM">

    <meta property="og:site_name" content="#">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:description" content="Need-Shipping cộng đồng ship tìm người - người tìm ship">
    <meta property="og:image" content="{{{ asset('admin/images/logo1.png') }}}"><!--Để hình logo-->
    <meta property="og:image:width" content="192">
    <meta property="og:image:height" content="192">
    <!-- Favicons -->
    <!-- {{ Html::image('admin/images/logo1.png') }}; -->
    <!-- <link rel="shortcut icon" href="{{{ asset('admin/images/logo1.png') }}}"> -->
    <!-- Css -->
    {{ Html::style('ns/css/bootstrap.min.css') }}
    {{ Html::style('ns/css/reset.css') }}   
    {{ Html::style('ns/css/home.css') }}
    {{ Html::style('ns/css/login.css') }}
    {{ Html::style('ns/css/font-awesome.min.css') }}
    <style>
      .s5h-header .dropdown-menu {
        left: auto;
        right: 0;
    }

    .s5h-header .dropdown-menu li {
        width: 100%;
    }

    .s5h-header .dropdown-menu li a {
        height: 60px;
        line-height: 60px;
    }
</style>
</head>
<body>

    <div class="s5h-header">
        <div class="container">
            <a class="s5h-logo" href="{{ url('/') }}" title="">{{ Html::image('ns/images/logo1.png') }}</a>
            <span class="s5h-menuicon"><i class="fa fa-bars"></i></span>
            <ul class="s5h-menu">  <!--F24738-->
                <li><a class="active" href="{{ url('/') }}" title="TRANG CHỦ">TRANG CHỦ</a> </li>
                <li><a href="{{ url('chinhsach') }}">CHÍNH SÁCH</a></li>
                <li><a href="#contact">LIÊN HỆ</a></li>
                
                @if(Auth::check())
                @if(Auth::user()->loai=='Shipper')
                <li>
                    <a href="{{ url('donhang') }}" style="color: #F24738; font-size: 18px;" title="Giao Hàng Ngay">
                      <i class="fa fa-truck w3-margin-right"></i>
                      GIAO HÀNG NGAY 
                  </a> 
              </li>
              <li><a href="{{ url('don-hang-da-nhan') }}"><i class="fa fa-bookmark-o w3-margin-right"></i> ĐƠN HÀNG ĐÃ NHẬN</a></li>
              @else
              <li>
                <a href="{{ url('Taodonhang') }}" style="color: #F24738; font-size: 18px;" title="Tạo Đơn Hàng">
                  <i class="fa fa-list w3-margin-right"></i>
                  TẠO ĐƠN HÀNG 
              </a> 
          </li>
      <li><a href="{{ url('don-hang-da-dang') }}"> <i class="fa fa-bookmark-o w3-margin-right"></i> ĐƠN HÀNG ĐÃ ĐĂNG</a></li>
      @endif
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user w3-margin-right"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('thongtin') }}"><i class="fa fa-info-circle w3-margin-right"></i> THÔNG TIN</a></li>
            <li><a href="{{ url('dangxuat') }}"><i class="fa fa-sign-out w3-margin-right"></i> ĐĂNG XUẤT</a></li>
        </ul>
    </li>
    @endif
</ul>
</div>
</div>
<!-- main -->
@yield('content')
<!-- endmain -->
<div class="s5h-ftshare">
    <div class="container">
        <ul>
            <li>
            <a href="https://www.facebook.com/dthtien" title="" target="_blank">
            <i class="fa fa-facebook" style=" color: #fff; animation-duration: 3s; animation-name: none;"></i>
            </a>
            </li>
        </ul>
    </div>
</div>
<div id="contact" class="s5h-footer">
    <div class="container">
        <h3 class="s5h-ft-title">CONTACT</h3>
        <ul class="s5h-ft-ctac">

            <li><a href="mailto:tiendt2311@gmail.com"> <i class="glyphicon glyphicon-envelope"></i> tiendt2311@gmail.com</a>
            </li>
            <li>
                <a href="tel:0965517309"><i class="fa fa-phone"></i>0966883284</a>
            </li>
        </ul>
        <p class="s5h-ft-add">Lớp HTTT2014, Trường Đại học Công Nghệ Thông Tin, Đại học quốc gia thành phố Hồ Chí Minh</p>
        <!-- <div class="row s5h-ft-form">
            <form id="contact" novalidate="novalidate">
                <div class="col-xs-4">
                    <input type="text" class="form-control" name="name" placeholder="Tên">
                </div>
                <div class="col-xs-4">
                    <input type="text" class="form-control" name="phone" placeholder="Điện thoại">
                </div>
                <div class="col-xs-4">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="col-xs-12">
                    <textarea rows="4" class="form-control" name="content" placeholder="Nội dung"></textarea>
                </div>
                <div class="col-xs-12 text-center">
                    <button class="btn btn-danger s5h-ft-btn" type="submit">Send</button>
                </div>
            </form>            
        </div> -->
    </div>
</div>
<!-- <script src="js/bootstrap.min.js"></script> -->
{{ HTML::script('ns/js/jquery.min.js') }}
{{ HTML::script('ns/js/bootstrap.min.js') }}
{{ HTML::script('ns/js/f-home.js')}}
</body>
</html>