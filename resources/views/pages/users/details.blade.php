@extends('layouts.master')

@section('title','Sản Phẩm')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group { padding: 2px 5px; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,800,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,300,300italic,500italic,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap CSS
	============================================ -->      
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- font-awesome.min CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    
    <!-- Mean Menu CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    
    <!-- owl.carousel CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    
    <!-- owl.theme CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">

    <!-- owl.transitions CSS
    ============================================ -->      
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
    
    <!-- Price Filter CSS
    ============================================ --> 
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">	

    <!-- nivo-slider css
    ============================================ --> 
    <link rel="stylesheet" href="{{asset('css/nivo-slider.css')}}">
    
    <!-- animate CSS
    ============================================ -->         
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <!-- jquery-ui-slider CSS
    ============================================ --> 
    <link rel="stylesheet" href="{{asset('css/jquery-ui-slider.css')}}">
    
    <!-- normalize CSS
    ============================================ -->        
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">

    <!-- main CSS
    ============================================ -->          
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    
    <!-- style CSS
    ============================================ -->          
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!-- responsive CSS
    ============================================ -->          
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    {{-- Slideshow --}}
    <link rel="stylesheet" href="{{asset('css/product/product details/slideshowproduct.css')}}">
    
  
    
@stop

@section('breadcrumb')
    @include('partial.users.breadcrumb')
@stop
@section('sidebar')
    @include('partial.users.sidebar')
@stop

@section('content')
{{-- @yield('sidebar'); --}}
<div class="product-item-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                {{-- <div class="product-item-categori">
                    <div class="product-type">
                        <h2>Product Type</h2>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Dresses</a></li>
                            <li><a href="#" class="active"><i class="fa fa-angle-right"></i>Shirts</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Coats</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Jackets</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Storts</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Jeans</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Skirts</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Lingeris</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Shoes</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Bags</a></li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="price-filter">
                    <h2>Filter by price</h2>
                    <div id="slider-range"></div>
                    <button class="btn btn-default">Filter</button>
                    <p>
                      <label for="amount">Price:</label>
                      <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                </div> --}}
                {{-- <div class="filter-size-area">
                    <h2>Filter by Size</h2>
                    <div class="filter-size">
                        <div class="filter-size-left">
                            <p>M (6)</p>
                            <p>X (7)</p>
                            <p>XS (10)</p>
                        </div>
                        <div class="filter-size-right">
                            <p>M (6)</p>
                            <p>X (7)</p>
                            <p>XS (10)</p>
                        </div>
                    </div>
                </div> --}}
                <div class="add-shop">
                    {{-- <div class="add-kids single-add">
                        <a href="#"><img src="img/banner/kids-ad.jpg" alt="add"></a>
                    </div>
                    <div class="add-dress single-add">
                        <a href="#"><img src="img/banner/kids-ad-2.jpg" alt="add"></a>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="product-item-tab">
                            <!-- Tab panes -->
                            <div class="single-tab-content">
                                <div class="tab-content">
                                    {{-- <div role="tabpanel" class="tab-pane active" id="img-one"><img src="{{asset('')}}{{$data_query->pro_avatar}}" alt="tab-img"></div> --}}
                                    {{-- <div role="tabpanel" class="tab-pane" id="img-two"><img src="img/single-product/single-product-2.jpg" alt="tab-img"></div>
                                    <div role="tabpanel" class="tab-pane" id="img-three"><img src="img/single-product/single-product-1.jpg" alt="tab-img"></div> --}}                            
                                    <!-- Container for the image gallery -->                                
                                        <!-- Full-width images with number text -->
                                        @for ($i = 0; $i < count($arr); $i++)
                                            <div class="mySlides">
                                            <div class="numbertext">{{$i+1}} / {{count($arr)}}</div>
                                                <img src="{{asset('')}}{{$arr[$i]}}" style="width:100%">
                                            </div>
                                        @endfor
                                        
                                    
                                        {{-- <div class="mySlides">
                                        <div class="numbertext">2 / 3</div>
                                            <img src="{{asset('')}}{{$data_query->pro_avatar}}" style="width:100%">
                                        </div>
                                    
                                        <div class="mySlides">
                                        <div class="numbertext">3 / 3</div>
                                            <img src="{{asset('')}}{{$data_query->pro_avatar}}" style="width:100%">
                                        </div> --}}

                                        <!-- Next and previous buttons -->
                                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                        <!-- Thumbnail images -->
                                        <div class="row">
                                        @for ($i = 0; $i < count($arr); $i++)
                                            <div class="column">
                                                <img class="demo cursor" src="{{asset('')}}{{$arr[$i]}}" style="width:100%" onclick="currentSlide({{$i+1}})" >
                                            </div>
                                        @endfor       
                                        
                                        {{-- <div class="column">
                                            <img class="demo cursor" src="{{asset('')}}{{$data_query->pro_avatar}}" style="width:100%" onclick="currentSlide(2)" >
                                        </div>
                                        <div class="column">
                                            <img class="demo cursor" src="{{asset('')}}{{$data_query->pro_avatar}}" style="width:100%" onclick="currentSlide(3)" >
                                        </div> --}}

                                        </div>
                                        
                                </div>
                            </div>
                            <!-- Nav tabs -->
                            {{-- <div class="single-tab-img">
                                <ul class="nav nav-tabs" role="tablist">
                                    @if(count($arr)!=0)
                                        @for ($i = 0; $i < count($arr); $i++)
                                            <li role="presentation"><a href="" role="tab" data-toggle="tab"><img src="{{asset($arr[$i])}}" alt="tab-img"></a></li>
                                        @endfor
                                    @else

                                    @endif
                                    {{-- <li role="presentation" class="active"><a href="#img-one" role="tab" data-toggle="tab"><img src="img/single-product/s1.jpg" alt="tab-img"></a></li>
                                    <li role="presentation" class="tab-last-li"><a href="#img-three" role="tab" data-toggle="tab"><img src="img/single-product/s3.jpg" alt="tab-img"></a></li> --}}
                                {{--</ul>--}}
                           {{-- </div> --}}
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="product-tab-content">
                            <div class="product-tab-header">
                                <h1>{{$data_query->pro_name}}</h1>
                                <div class="best-product-rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <p>(3 costomar review)</p>
                                </div>
                                @if($hasSale != 0)
                                    <b><span style="color: red; font-size: 20px" id="text-Price">{{number_format(($data_query->price*(100-$sale[0]->discount))/100, 0, ',', '.')}} VND</span></b>
                                    <del style="font-size:14px; color: rgb(75, 68, 68)" id="del-Price"> {{number_format($data_query->price, 0, ',', '.')}} VND</del>

                                @else
                                <h3 style="color: red" id="text-Price">{{number_format($data_query->price, 0, ',', '.')}} VND</h3>
                                @endif
                            </div>
                            {{-- <div class="product-item-code">
                                <p>Item Code  :   #897896</p>
                                <p>Availability :   In stock</p>
                            </div> --}}
                            <div class="product-item-details">
                                <p>Mô Tả</p>
                                {{-- <p>@php echo $data_query->pro_content @endphp</p> --}}
                            </div>
                            <div class="size-chart">
                                <p>Các Loại: 
                                @for ($i = 0; $i <count($details); $i++)
                                    @if($i == 0)
                                        <button class="btn btn-danger " onclick="pickPrice(this,{{$details[$i]->id}})" >{{$details[$i]->type}} <i class="fa-solid fa-check"></i></button>
                                    @else
                                        <button class="btn btn-danger " onclick="pickPrice(this,{{$details[$i]->id}})" >{{$details[$i]->type}} </button>
                                    @endif
                                @endfor
                                </p>
                                <!--
                                <select name="" id="">
                                    <option value="">Size Chart: <i class="fa fa-plus"></i></option>
                                    <option value="">Lg</option>
                                    <option value="">Xs</option>
                                    <option value="">Xs</option>
                                </select>
                                -->
                            </div>
                            <div class="product-item-code"> 
                                <p>Số Lượng:
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                            <span class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                            <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </p>   
                                <div class="product-item-details">
                                    <button class="btn btn-warning" style="padding: 15px 32px;margin: 4px 2px;" onclick="OrderProductDetail()">
                                        Thêm Vào Giỏ Hàng
                                    </button>
                                </div>
                                                    
                                {{-- <div class="color-option fix">
                                    <p>Color:</p>
                                    <a href="#" class="color-1"></a>
                                    <a href="#" class="color-2"></a>
                                    <a href="#" class="color-3"></a>
                                    <a href="#" class="color-4"></a>
                                    <a href="#" class="color-5"></a>
                                    <a href="#" class="color-6"></a>
                                </div>
                                <div class="size-option fix">
                                    <p>Size:</p>
                                    <select>
                                        <option value="Choose an option">Choose an option</option>
                                        <option value="Lg">Lg</option>
                                        <option value="Xs">M</option>
                                        <option value="Xs">Xs</option>
                                    </select>
                                </div>
                                <div class="wishlist-icon">
                                    <div class="single-wishlist">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <p>wishlist</p>
                                    </div>
                                    <div class="single-wishlist">
                                        <a href="#"><i class="fa fa-signal"></i></a>
                                        <p>Compare</p>
                                    </div>
                                </div> --}}
                            </div> 
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="description-tab">
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#description" role="tab" data-toggle="tab">Mô tả</a></li>
                                {{-- <li role="presentation"><a href="#information" role="tab" data-toggle="tab">Addisonal information</a></li> --}}
                                {{-- <li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">Đánh giá (3)</a></li> --}}
                            </ul>
                              <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="description">
                                    <p>@php echo $data_query->pro_content @endphp</p>
                                </div>
                                {{-- <div role="tabpanel" class="tab-pane" id="information">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>

                                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. </p>
                                </div> --}}
                                {{-- <div role="tabpanel" class="tab-pane" id="reviews">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>

                                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-product-slider similar-product">
                            <div class="product-items">
                                <h2 class="product-header">Sản phẩm liên quan</h2>
                                <div class="row">
                                    <div id="singleproduct-slider" class="owl-carousel">
                                        @foreach ($randomquery as $value)
                                            <div class="col-md-4">
                                                <div class="single-product">
                                                    <div class="single-product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="{{asset($value->pro_avatar)}}" alt="product">                                              
                                                        </a>
                                                        <div class="single-product-action">
                                                            <a href="#"><i class="fa fa-external-link"></i></a>
                                                            <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="single-product-content">
                                                        <div class="product-content-left">
                                                            <h5><a href="#" style="color:black">{{$value->pro_name}}</a></h5>														
                                                            <span style="color: #129FD8">{{$value->price}} vnđ/ {{$value->type}}
                                                                <span style="color: #7A7A7A; font-size: 10px"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="col-md-4">
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="#">
                                                        <img class="primary-img" src="img/product/kids-2.jpg" alt="product">
                                                        <img class="secondary-img" src="img/product/single-product-2.jpg" alt="product">
                                                    </a>
                                                    <div class="single-product-action">
                                                        <a href="#"><i class="fa fa-external-link"></i></a>
                                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="single-product-content">
                                                    <div class="product-content-left">
                                                        <h2><a href="#">EXCLUSIVE STYLE</a></h2>
                                                        <p>Jacket’s</p>
                                                    </div>
                                                    <div class="product-content-right">
                                                        <h3>$27.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="#">
                                                        <img class="primary-img" src="img/product/kids-4.jpg" alt="product">
                                                        <img class="secondary-img" src="img/product/men-2.jpg" alt="product">
                                                    </a>
                                                    <div class="single-product-action">
                                                        <a href="#"><i class="fa fa-external-link"></i></a>
                                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="single-product-content">
                                                    <div class="product-content-left">
                                                        <h2><a href="#">EXCLUSIVE STYLE</a></h2>
                                                        <p>Jacket’s</p>
                                                    </div>
                                                    <div class="product-content-right">
                                                        <h3>$27.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="#">
                                                        <img class="primary-img" src="img/product/single-product-1.jpg" alt="product">
                                                        <img class="secondary-img" src="img/product/kids-1.jpg" alt="product">
                                                    </a>
                                                    <div class="single-product-action">
                                                        <a href="#"><i class="fa fa-external-link"></i></a>
                                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="single-product-content">
                                                    <div class="product-content-left">
                                                        <h2><a href="#">EXCLUSIVE STYLE</a></h2>
                                                        <p>Jacket’s</p>
                                                    </div>
                                                    <div class="product-content-right">
                                                        <h3>$27.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="#">
                                                        <img class="primary-img" src="img/product/single-product-2.jpg" alt="product">
                                                        <img class="secondary-img" src="img/product/women-2.jpg" alt="product">
                                                    </a>
                                                    <div class="single-product-action">
                                                        <a href="#"><i class="fa fa-external-link"></i></a>
                                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="single-product-content">
                                                    <div class="product-content-left">
                                                        <h2><a href="#">EXCLUSIVE STYLE</a></h2>
                                                        <p>Jacket’s</p>
                                                    </div>
                                                    <div class="product-content-right">
                                                        <h3>$27.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="single-product">
                                                <div class="single-product-img">
                                                    <a href="#">
                                                        <img class="primary-img" src="img/product/single-product-3.jpg" alt="product">
                                                        <img class="secondary-img" src="img/product/men-2.jpg" alt="product">
                                                    </a>
                                                    <div class="single-product-action">
                                                        <a href="#"><i class="fa fa-external-link"></i></a>
                                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="single-product-content">
                                                    <div class="product-content-left">
                                                        <h2><a href="#">EXCLUSIVE STYLE</a></h2>
                                                        <p>Jacket’s</p>
                                                    </div>
                                                    <div class="product-content-right">
                                                        <h3>$27.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{--quick defined--}}
    
    {{-- slideshow --}}
    <script src="{{asset('js/custom/user/product/product details/slideshow.js')}}"></script>
    <script>
        var orderProduct = "{{route('orderProduct')}}";
        var id_productByType;
        var first_Price;
        var id_Product = "{{$data_query->product_id}}";
        var _token = "{{ csrf_token() }}";
        window.onload = function(){
            id_productByType = "{{$details[0]->id}}";
            first_Price = "{{$data_query->price}}";
        }
        var getPriceById = "{{route('getPriceById')}}";
        var urlSearch = "{{route('searchProduct')}}";
    </script>
    <script src="{{asset('js/custom/user/order.js')}}"></script>
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
@stop
