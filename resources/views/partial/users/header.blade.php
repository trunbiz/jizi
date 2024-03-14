<body class="home-one">
    <!-- HEADER AREA -->
    <div class="header-area">
        <div class="header-top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="header-top-left">
                            <div class="header-top-menu">
                                <ul class="list-inline">
                                    {{-- <li><img src="img/vn.png" alt="flag"></li> --}}
                                    <li class="dropdown"><a href="#" data-toggle="dropdown">Việt Nam</a>
                                        {{-- <ul class="dropdown-menu">
                                            <li><a href="#">Spanish</a></li>
                                            <li><a href="#">China</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="dropdown"><a href="#" data-toggle="dropdown">VNĐ</a>
                                        {{-- <ul class="dropdown-menu usd-dropdown">
                                            <li><a href="#">USD</a></li>
                                            <li><a href="#">GBP</a></li>
                                            <li><a href="#">EUR</a></li>
                                        </ul> --}}
                                    </li>
                                </ul>
                            </div>
                            <p>Welcome visitor!</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="header-top-right">
                            <ul class="list-inline">
                                @if(session('id_user'))                                    
                                    <li>
                                        <div id="user-name">
                                            <a href="{{route('user.index')}}" style="color: #85ff85" ><i class="fa fa-user"></i>Xin Chào {{session('user_name')}}</a>
                                            <div class="user-dropdown-menu">
                                                <a href="{{route('user.index')}}">Thông tin tài khoản</a>
                                                <a href="{{route('changePasswordPage')}}">Đổi mật khẩu</a>
                                                <a href="{{route('showBillPlaced')}}">Hàng Đang Đặt</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}"><i class="fa fa-user-times"></i> Đăng Xuất </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('user.login')}}"> <i class="fa fa-lock"></i>Đăng Nhập </a>                                    
                                    </li>
                                    <li>
                                        <a href="{{route('register')}}"><i class="fa fa-pencil-square-o"></i>Đăng Ký</a>
                                    </li> 
                                @endif 
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="header-logo">
                            <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" style="width:50px;height:50px;" alt="logo"><strong>ZIHI TEA</strong></a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="search-chart-list">
                            <div class="catagori-menu">
                                {{-- <ul class="list-inline">
                                    <li><i class="fa fa-search"></i></li>
                                    <li>
                                        <select>
                                            <option value="All Categories">Danh mục</option>
                                            <option value="Categorie One">Cá</option>
                                            <option value="Categorie Two">Cua-Ghẹ</option>
                                            <option value="Categorie Three">Ngao-Sò-Ốc</option>
                                            <option value="Categorie Four">Tôm các loại</option>
                                            <option value="Categorie Five">Mực</option>
                                        </select>
                                    </li>
                                </ul> --}}
                            </div>
                            <div class="header-search" >                                    
                                 <div class="form-group">
                                    <input type="search" class="form-control rounded input-lg" placeholder="Tìm kiếm sản phẩm" id="searchbar" name="search" style="padding: 5px;"/>

                                    <div class="resultcontent" id="result">
                                        
                                    </div>

                                </div>
                            </div>
                            
                            <div class="header-chart">
                                <ul class="list-inline">
                                    <li><a href="{{route('showBillPlaced')}}"><i class="fa fa-cart-arrow-down"></i></a></li>
                                    <li class="chart-li list-data"><a href="{{route('showBill')}}">ĐƠN HÀNG</a>
                                        <ul>
                                            <li id="header-order">
                                                @isset($numberOrder)                                                    
                                                @if ($numberOrder != 0)                                                    
                                                    @if($numberOrder <= 3)
                                                    <div class="header-chart-dropdown" >
                                                    @else
                                                    <div class="header-chart-dropdown list-data" >
                                                    @endif
                                                        @foreach ($dataOrder as $item)
                                                        <div class="header-chart-dropdown-list ">
                                                            <div class="dropdown-chart-left floatleft">
                                                                <a href="#"><img src="{{asset("$item->pro_avatar")}}" alt="list" style="width:80px;height: 80px;"></a>
                                                            </div>
                                                            <div class="dropdown-chart-right">
                                                                <h2><a href="#">{{$item->pro_name}}</a></h2>
                                                                <h3>Số Lượng: {{$item->bd_amount}}</h3>
                                                                <h4>{{number_format($item->bd_total_amount, 0, ',', '.') . " vnđ"}}</h4>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div class="chart-checkout">
                                                            <p>TỔNG CỘNG<span>{{number_format($item->b_total, 0, ',', '.') . " vnđ"}}</span></p>
                                                            <button type="button" onclick="window.location.href='{{route('showBill')}}'" class="btn btn-default">THANH TOÁN</button>
                                                        </div>
                                                    </div> 
                                                @else
                                                <div class="header-chart-dropdown" style="text-align: center; color:blue">
                                                    No Data
                                                </div>
                                                @endif
                                            </li> 
                                        </ul> 
                                    </li>
                                    <li ><a href="#" id="quatityOrder">{{$numberOrder}} Sản phẩm</a></li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN MENU AREA -->    
    <!-- SUPPORT AREA -->
    <div class="support-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-plane"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>GIAO HÀNG  </h2>
                            <p>Miễn Phí Vận Chuyển</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-dollar"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>ĐỔI TRẢ 1 VS 1</h2>
                            <p>Nhanh Chống Tại Nhà</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-clock-o"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>HỔ TRỢ 24/7</h2>
                            <p>Tư Vấn Online</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm col-xs-12">
                    <div class="single-support">
                        <div class="sigle-support-icon">
                            <p><i class="fa fa-umbrella"></i></p>
                        </div>
                        <div class="sigle-support-content">
                            <h2>KHÁCH HÀNG VIP</h2>
                            <p>Ưu Đãi Mua Hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    