
<body class="home-one">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
           
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
                                {{-- <li><a href="#"><i class="fa fa-user"></i>Tài Khoản Của Tôi</a></li> --}}
                                {{-- <li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
                                <li><a href="checkout.html"><i class="fa fa-check-square-o"></i>Checkout</a></li> --}}
                                @if(session('id_admin'))                                    
                                    <li>
                                        <a href="#" style="color: #85ff85"><i class="fa fa-user"></i>Xin Chào {{session('admin_name')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin_logout')}}"><i class="fa fa-user-times"></i> Đăng Xuất </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('adminLogin')}}"> <i class="fa fa-lock"></i>Đăng Nhập </a>                                    
                                    </li>
                                    <li>
                                        <a href="{{route('form_Register')}}"><i class="fa fa-pencil-square-o"></i>Đăng Ký</a>
                                    </li> 
                                @endif 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- MAIN MENU AREA -->
    <div class="main-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-menu hidden-xs">
                        <nav>
                            <ul>
                                @if (session('permission') == 2)
                                    <li><a href="index.html">Trang Chủ</a></li>
                                    <li><a href="{{route('form-editProduct')}}">Sản Phẩm</a></li>
                                    <li><a href="{{route('form_editCategories')}}">Danh Mục</a></li>
                                    <li><a href="{{route('getmanageSuppliers')}}">Nhà Cung Cấp</a></li>
                                    <li><a href="{{route('listOrder')}}">QL Đặt Hàng</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('listOrder')}}">Chờ Duyệt</a></li>
                                            <li><a href="{{route('showDelivery')}}">Đang Giao</a></li>
                                            <li><a href="{{route('delivery_confirmation')}}">HOÀN TẤT GIAO DỊCH</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('showOffer')}}">Giới Thiệu Sản Phẩm</a></li>  
                                    <li>
                                        <a href="{{route('showPageSale')}}">Khuyến Mãi</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('showPageSale')}}">Thêm Sản Phẩm</a></li>
                                            <li><a href="{{route('ProductOnSale')}}">Đang Khuyến Mãi</a></li>
                                        </ul>
                                    </li>                               
                                    <li><a href="{{route('showChartProduct')}}">Thống Kê</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('showThongBao')}}">Thông Báo</a></li>
                                        </ul>
                                    </li>  
                                @else 
                                    <li><a href="index.html">Trang Chủ</a></li>
                                    <li><a href="{{route('listOrder')}}">QL Đặt Hàng</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('listOrder')}}">Chờ Duyệt</a></li>
                                            <li><a href="{{route('showDelivery')}}">Đang Giao</a></li>
                                            <li><a href="{{route('delivery_confirmation')}}">HOÀN TẤT GIAO DỊCH</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('showOffer')}}">Giới Thiệu Sản Phẩm</a></li>  
                                    <li>
                                        <a href="{{route('showPageSale')}}">Khuyến Mãi</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('showPageSale')}}">Thêm Sản Phẩm</a></li>
                                            <li><a href="{{route('ProductOnSale')}}">Đang Khuyến Mãi</a></li>
                                        </ul>
                                    </li>                               
                                    <li><a href="{{route('showChartProduct')}}">Thống Kê</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('showThongBao')}}">Thông Báo</a></li>
                                        </ul>
                                    </li>  
                                @endif
                                                              
                            </ul>
                        </nav>
                    </div>
                    <!-- Mobile MENU AREA -->
                    <div class="mobile-menu hidden-sm hidden-md hidden-lg">
                        <nav>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a>
                                    <ul>
                                        <li><a href="#">Shop Layouts</a>
                                            <ul>
                                                <li><a href="#">Full Width</a></li>
                                                <li><a href="#">Sidebar Left</a></li>
                                                <li><a href="#">Sidebar Right</a></li>
                                                <li><a href="#">List View</a></li>
                                            </ul>	
                                        </li>
                                        <li><a href="#">Shop Pages</a>
                                            <ul>
                                                <li><a href="#">Category</a></li>
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">Wishlist</a></li>
                                                <li><a href="#">Shopping Cart</a></li>
                                            </ul>	
                                        </li>
                                        <li><a href="#">Product Types</a>
                                            <ul>
                                                <li><a href="#">Simple Product</a></li>
                                                <li><a href="#">Variable Product</a></li>
                                                <li><a href="#">Grouped Product</a></li>
                                                <li><a href="#">Downloadable</a></li>
                                            </ul>	
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Men</a></li>
                                <li><a href="shop.html">Women</a></li>
                                <li><a href="shop.html">Kids</a></li>
                                <li><a href="shop.html">gift</a></li>
                                <li><a href="blog-left-sidebar.html">Blog</a>
                                    <ul>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-single.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop.html">Men</a></li>
                                        <li><a href="shop.html">Women</a></li>
                                        <li><a href="shop.html">Kids</a></li>
                                        <li><a href="shop.html">Gift</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="single-product.html">Single Product</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="look-book.html">Look Book</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
   