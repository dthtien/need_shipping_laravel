              @extends('ns.master')
              @section('content')
              <div class="s5h-banner">
                <div class="container">
                  <div class="row">
                    <div id="intro" class="col-sm-6 col-xs-12  col-sm-push-6">
                      <div class="s5h-bntitle"><p style="font-size: 50px;"><big>Trang vận chuyển </big></p><p> Của cộng đồng Ship tìm người- người tìm ship<br>Giúp bạn tìm shipper và đơn hàng dễ dàng, nhanh chóng.</p>
                      </div>
                      @if(!Auth::check())
                      <div class="s5h-bninfo"></div>
                      <div class="s5h-bntitle"> <p>Đăng nhập để đăng hoặc tìm đơn hàng</p></div>
                      <ul class="s5h-bndown-ul">
                        <li class="s5h-bndown-ship"><a href="{{ url('dangnhap') }}" style=" color: #fff; font-size: 18px; " title="Đăng Nhập">
                          <i class="fa fa-sign-in w3-margin-right"></i>
                          ĐĂNG NHẬP
                        </a></li>
                        <li class="s5h-bndown-ship"><a href="{{ url('dangky') }}" style=" color: #fff; font-size: 18px; " title="Đăng ký nếu bạn chưa có tài khoản">
                         <i class="fa fa-edit w3-margin-right"></i>
                         ĐĂNG KÝ
                       </a></li>
                     </ul>
                   </div>
                   @else
                   @if(Auth::user()->loai=="Shipper")
                   <div class="s5h-bninfo"></div>
                   <div class="s5h-bntitle"> <p>Bạn có thể tìm đơn hàng</p></div>
                   <ul class="s5h-bndown-ul">
                    <li class="s5h-bndown-ship"><a href="{{ url('donhang') }}" title="Chuyển hàng ngay">
                     <i class="fa fa-truck w3-margin-right"></i>
                     CHUYỂN HÀNG NGAY
                   </a>
                 </li>
               </ul>
               </div> 
               @else
               <div class="s5h-bninfo"></div>
               <div class="s5h-bntitle"> <p>Bạn có thể đăng đơn hàng</p></div>
               <ul class="s5h-bndown-ul">
                 <li class="s5h-bndown-ship"><a href="{{ url('Taodonhang') }}" title="Tạo Đơn hàng">
                   <i class="fa fa-list w3-margin-right"></i>
                   TẠO ĐƠN HÀNG
                 </a></li>
               </ul>
             </div>
             @endif
             @endif
             <div class="col-sm-6 col-xs-12 col-sm-pull-6">
              <div class="s5h-bnimg slideInUp wow" data-wow-duration="3s" data-wow-delay="1s" style="visibility: visible; animation-duration: 3s; animation-delay: 1s; animation-name: slideInUp;">
                <!-- <img src="./images/shipper1.png" alt=""> -->
                {{ Html::image('ns/images/shipper1.png') }};
              </div>
            </div>
          </div>
        </div>
      </div>
      <section id="hiw">
        <div class="container">
          <div class="s5h-why5ship" style="background-color: #FFFEF2">
            <div class="col-lg-12 text-center">
              <h2 class="s5h-why5s-title">Vì sao nên dùng Need-Shipping.com?</h2>
            </div>
          </div>
        </div>
      </section>
      <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox" style="padding-bottom: 20px">
          <div class="item active">
            <div class="s5h-why5s-item">
             <div class="s5h-why5s-icon flipInX wow" data-wow-duration="2s" data-wow-delay="0" style="visibility: visible; animation-duration: 3s; animation-name: flipInX;">
              <span>
                <i class="fa fa-shopping-cart"></i>
              </span>
            </div> 
            <h4>NHẬN NHANH - CHUYỂN NHANH</h4>
            <div class="s5h-why5s-info ">
              Trang web phát triển từ cộng đồng ship- shop lớn nhất Việt Nam giúp bạn tìm shipper và đơn hàng dễ dàng, nhanh chóng.
            </div>
            <div class="s5h-why5s-icon flipInX wow" data-wow-duration="1s" data-wow-delay="0" style="visibility: visible; animation-duration: 3s; animation-name: flipInX;">
              <span><i class="fa fa-map-pin"></i></span>
            </div> 
            <h4>TIỆN ĐƯỜNG</h4>
            <div class="s5h-why5s-info">
              Hiển thi những khoảng cách ship để bạn tiện sắp xếp
            </div>
          </div>
        </div>
        <div class="item s5h-why5s-item">
          <div class="s5h-why5s-icon flipInX wow" data-wow-duration="1s" data-wow-delay="0" style="visibility: visible; animation-duration: 3s; animation-name: flipInX;">
            <span><i class="fa fa-credit-card-alt"></i></span>
          </div> 
          <h4>Quản lý đơn hàng</h4>
          <div class="s5h-why5s-info">
            Thông kê danh sách đơn hàng đã nhận
            Và danh sách đơn hàng đã đăng.
          </div>
          <div class="s5h-why5s-icon flipInX wow" data-wow-duration="1s" data-wow-delay="0" style="visibility: visible; animation-duration: 3s; animation-name: flipInX;">
            <span><i class="fa fa-american-sign-language-interpreting"></i></span>
          </div> 
          <h4>AN TOÀN</h4>
          <div class="s5h-why5s-info">
            Biết shipper của bạn là ai và đơn hàng bạn nhận như thế nào.
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    @stop