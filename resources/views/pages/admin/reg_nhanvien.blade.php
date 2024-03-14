@extends('layouts.login')

@section('title', 'Tạo Tài Khoản Nhân Viên')


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
                    <h1 class="display-6 text-center mb-3"> ĐĂNG KÝ QUYỀN NHÂN VIÊN</h1>
                    <!-- Subheading -->
                    <p class="text-muted text-center mb-5"></p>
                    {{-- @if ($errors->any())
                        
                    @endif --}}
                    <!-- Form -->
                    <form type="form" action="{{route('register_nhanvien')}}" method="POST" id="register">
                        @csrf
                        <!-- tên người dùng -->
                        <div class="form-group mt-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <!-- Label --><label>TÊN NGƯỜI DÙNG</label>
                                </div>
                            </div> <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="text" placeholder="Họ và Tên phải nhiều hơn 6 ký tự" class="form-control form-control-appended" name="admin_name" value="{{old('admin_name')}}"/>
                                <span style="color: red" class="error_admin_name error"></span>
                            </div>
                            {{-- label thông báo lỗi --}}
                           
                        </div>
                        <!-- email -->
                        <div id="i4x74" class="form-group mt-2 mb-2">
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">EMAIL</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="email" placeholder="Email dùng để đăng nhập" class="form-control form-control-appended" name="admin_mail" value="{{old('admin_mail')}}"/>
                                {{-- label thông báo lỗi --}}
                                <span style="color: red" class="error_admin_mail error"></span>
                            </div>
                        </div>
                        {{-- Số Điện Thoại --}}
                        <div class="form-group mt-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <!-- Label --><label>SỐ ĐIỆN THOẠI</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="text" placeholder="Số điện thoại " class="form-control form-control-appended" name="admin_phone" value="{{old('admin_phone')}}"/>
                                <span style="color: red" class="error_admin_phone error"></span>
                            </div>
                            {{-- label thông báo lỗi --}}
                            
                        </div>
                        {{-- Mật khẩu --}}
                        <div id="i4x74" class="form-group mt-2 mb-2">
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">MẬT KHẨU</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="password" placeholder="Mật khẩu " class="form-control form-control-appended" name="admin_password" value="{{old('admin_password')}}"/>
                                <span style="color: red" class="error_admin_password error"></span>
                            </div>
                            {{-- label thông báo lỗi --}}
                           
                        </div>
                        {{-- Xác Nhận Mật khẩu --}}
                        <div id="i4x74" class="form-group mt-2 mb-2">
                            <div id="icrqh" class="row">
                                <div id="iwfuf" class="col">
                                    <!-- Label -->
                                    <label id="ipd68">XÁC MẬT KHẨU</label>
                                </div>
                            </div> 
                            <!-- / .row -->
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
                                <!-- Input -->
                                <input type="password" placeholder="Nhập Lại Mật khẩu " class="form-control form-control-appended" name="admin_password_repeat" value="{{old('admin_password_repeat')}}"/>
                                <span style="color: red" class="error_admin_password_repeat error"></span>
                            </div>
                            {{-- label thông báo lỗi --}}
                           
                        </div>
                        <!-- Submit -->
                        <p class="text-center">
                            <button id="ixxr2" class="btn btn-lg btn-block btn-primary mb-3 mt-2"> ĐĂNG KÝ </button><!-- Link -->
                          
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

@section('scripts')    
@stop