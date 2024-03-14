@extends('layouts.master')

@section('title', 'ĐƠN HÀNG')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group { padding: 2px 5px; }
        div.scroll {
                margin:4px, 4px;
                padding:4px;
                /* background-color: green; */
                width: 500px;
                height: 500px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }
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
    
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
@stop

@section('breadcrumb')
    @include('partial.users.breadcrumb')
@stop
@section('sidebar')
    @include('partial.users.sidebar')
@stop
@section('content') 
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="billing-address">
                        <div class="checkout-head">
                            <h2>ĐỊA CHỈ THANH TOÁN</h2>
                            <p>Điền thông tin chi tiết nhất để giao hàng nhanh nhất</p>
                        </div>
                        <div class="checkout-form">
                            <form action="#" method="post" class="form-horizontal">
                                @if($dataUser[0] != null)  
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Họ Tên <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$dataUser[0]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Email <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" readonly value="{{$dataUser[1]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Số Điện Thoại <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$dataUser[2]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Thành Phố, Tỉnh <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$dataUser[3]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                       Quận, Huyện<sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$dataUser[4]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Phường, Xã <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$dataUser[5]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Thông Tin Khác
                                    </label>
                                    <div class="col-md-9">
                                        <textarea rows="9" id="thongtinkhac"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Họ Tên <sup>*</sup>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  value="" placeholder="Họ và tên">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Email <sup>*</sup>
                                </label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control"  value="" placeholder="Email người đặt hàng">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Số Điện Thoại <sup>*</sup>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  value="" placeholder="Số điện thoại nhận hàng">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Thành Phố, Tỉnh <sup>*</sup>
                                </label>
                                <div class="col-md-9" id="city_name">
                                    <select class="form-control" id="city" name="city">
                                        @if(!empty($dataCity))                        
                                            @foreach($dataCity as $city)
                                                <option value="{{$city->city_code}}" class="option_city" >{{$city->city_name}}</option>
                                            @endforeach
                                        @else
                                            <option value="null">Null</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                Quận, Huyện<sup>*</sup>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="district" name="district">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Phường, Xã <sup>*</sup>
                                </label>
                                <div class="col-md-9" id="district_name">
                                    <select class="form-control" id="wards" name="wards">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Thông Tin Khác
                                </label>
                                <div class="col-md-9">
                                    <textarea rows="9" ></textarea>
                                </div>
                            </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 ">
                    @if(count($dataBill) != 0)
                    <div class="review-order scroll">
                        <div class="checkout-head">
                            <h2>Các Sản Phẩm Bạn Đặt</h2>
                        </div>
                        @foreach ($dataBill as $bill)                          
                        <div class="single-review">
                            <div class="single-review-img">
                                <a href="#"><img src="{{asset('')}}{{$bill->pro_avatar}}" alt="review" style="width:100px;height: 100px;"></a>
                            </div>
                            <div class="single-review-content fix">
                                <h2><a href="#">{{$bill->pro_name}}</a></h2>
                                <p><span>Loại :</span> {{$bill->type}}</p>
                                <p><span>Số Lượng :</span> {{$bill->bd_amount}}</p>
                                <h3>Tổng: {{number_format($bill->bd_total_amount,0,',','.'). " vnđ"}}</h3>
                            </div>
                        </div>
                        @endforeach 
                    </div>

                    <div class="subtotal-area">
                        <div class="subtotal-content fix">
                            <h2 class="floatleft">Tổng Cộng</h2>
                            <h2 class="floatright">{{number_format($bill->b_total, 0,',','.'). " vnđ"}}</h2>
                            {{-- <h2>{{$wordPrice}}</h2> --}}
                        </div>
                        {{-- <div class="subtotal-content fix">
                            <h2 class="floatleft">Shipping & Handling </h2>
                            <h2 class="floatright">$15</h2>
                        </div> --}}
                        <div class="subtotal-content fix">
                            <h2 class="">Bằng Chữ</h2>
                            <h2 class="">{{$wordPrice}}</h2>

                        </div>
                    </div>
                    <div class="payment-method">
                        <h2>PHƯƠNG THỨC THANH TOÁN</h2>
                        <div class="payment-checkbox">
                            <input type="checkbox" checked> Thanh Toán Khi Nhận Hàng
                        </div>
                        <p>Nhân Viên DVKH sẽ xác nhận lại đơn hàng của Bạn trước khi giao hàng.</p>
                        {{-- <div class="payment-checkbox">
                            <input type="checkbox"> Chaque Payment <br>
                            <input type="checkbox"> Paypal
                        </div> --}}
                        <button type="button" class="btn" onclick="confirOrder({{$bill->b_id}},{{session('id_user')}})" >Đặt Hàng</button>
                    </div>
                    @endif                       

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
    <script>
        var urlOrderConfirm = "{{route('orderConfirm')}}";
    </script>
    <script src="{{asset('js/custom/user/order.js')}}"></script>

    <script src="{{asset('js/custom/address.js')}}"></script>
@stop