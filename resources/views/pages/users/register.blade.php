@extends('layouts.login')

@section('title', 'Đăng Ký Tài Khoản')


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

    
    
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
@stop
@section('content')
<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div id="ij88" class="col-12 col-md-5 col-xl-6 my-5">
                <!-- Heading -->
                <div class="card p-md-5 p-2">
                    <h1 class="display-4 text-center mb-3"> ĐĂNG KÝ </h1>
                    <!-- Subheading -->
                    <p class="text-muted text-center mb-5"></p>
                    {{-- @if ($errors->any())
                        
                    @endif --}}
                    <!-- Form -->
                    <form type="form" action="{{route('post_register')}}" method="POST" id="from_register" 
                    data-netlify="true" enctype="multipart/form-data">
                        @csrf
                        <!-- tên người dùng -->
                        <div class="form-group mt-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <!-- Label --><label>TÊN NGƯỜI DÙNG (*)</label>
                                </div>
                            </div> <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="text" 
                                class="form-control form-control-appended" name="user_name" />
                                <label style="color: red" class="error error_user_name"></label>

                            </div>
                            {{-- label thông báo lỗi --}}
                        </div>
                        <!-- email -->
                        <div id="i4x74" class="form-group mt-2 mb-2">
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">EMAIL (*)</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="email" placeholder="Email dùng để đăng nhập" class="form-control form-control-appended" name="user_mail" />
                                {{-- label thông báo lỗi --}}
                                <label style="color: red" class="error error_user_mail"></label>
                            </div>
                        </div>
                        {{-- Số Điện Thoại --}}
                        <div class="form-group mt-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <!-- Label --><label>SỐ ĐIỆN THOẠI (*)</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="text" placeholder="Số điện thoại " class="form-control form-control-appended" name="user_phone" />
                                <label style="color: red" class="error error_user_phone"></label>

                            </div>
                            {{-- label thông báo lỗi --}}
                        </div>
                        {{-- Mật khẩu --}}
                        <div id="i4x74" class="form-group mt-2 mb-2">
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">MẬT KHẨU (*)</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="password" placeholder="Mật khẩu " class="form-control form-control-appended" name="user_password" />
                                <label style="color: red" class="error error_user_password"></label>

                            </div>
                            <span class="text-muted">(Mật khẩu từ 8-16 ký tự)</span>
                            {{-- label thông báo lỗi --}}

                        </div>
                        {{-- Xác Nhận Mật khẩu --}}
                        <div id="i4x74" class="form-group mt-2 mb-2">
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">XÁC NHẬN MẬT KHẨU (*)</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="password" placeholder="Nhập Lại Mật khẩu " class="form-control form-control-appended" name="user_password_repeat" />
                                <label style="color: red" class="error error_user_password_repeat"></label>

                            </div>
                            {{-- label thông báo lỗi --}}

                        </div>
                        
                        <div id="i4x74" class="form-group mt-2 mb-2">
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">TỈNH, THÀNH PHỐ (*)</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Select City -->
                            <div class="form-group" id="city_name">
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
                            {{-- label thông báo lỗi --}}
                            {{-- Select district --}}
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">QUẬN, HUYỆN (*)</label>
                                </div>
                            </div> 
                            <div class="form-group" id="district_name">
                                <select class="form-control" id="district" name="district">

                                </select>
                            </div>
                            {{-- Select wards --}}
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">XÃ, PHƯỜNG, THỊ TRẤN (*)</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <select class="form-control" id="wards" name="wards">

                                </select>
                            </div>

                        </div>
                        <!-- Submit -->
                        <p class="text-center">
                            <button type="submit" id="ixxr2" class="btn btn-lg btn-block btn-primary mb-3 mt-2"> ĐĂNG KÝ </button><!-- Link -->
                          
                        </p>
                        {{-- <div id="i4x74" class="form-group mt-2 mb-2">
                            <input type="submit" value="ĐĂNG KÝ">
                        </div> --}}
                        <div class="text-center">
                            <small class="text-muted text-center"> Back to 
                                <a href="{{ route('home')}}">Home</a>. 
                            </small>
                        </div>
                    </form>
                </div>
            </div> <!-- / .row -->
        </div>
    </div> <!-- / .container -->
</section>
@stop