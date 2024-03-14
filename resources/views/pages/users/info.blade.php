@extends('layouts.master')

@section('title', 'Thông tin người dùng')

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
                            <h2>THÔNG TIN NGƯỜI DÙNG</h2>
                            <p>Điền thông tin chi tiết nhất để giao hàng nhanh nhất</p>
                        </div>
                        <div class="checkout-form">
                            <form action="#" method="post" class="form-horizontal">
                                @if(!empty($data))
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Họ Tên <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$data[0]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Email <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" readonly value="{{$data[1]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Số Điện Thoại <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" disabled value="{{$data[2]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Thành Phố, Tỉnh <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$data[3]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                    Quận, Huyện<sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$data[4]}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Phường, Xã <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="{{$data[5]}}">
                                    </div>
                                </div>
                                <div class="form-group"></div>
                                {{-- <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Postcode <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        E-mail Address <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Phone <sup>*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12">
                                        <input type="checkbox"> Create an account?
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12">
                                        <input type="checkbox"> Ship a billing address?
                                    </label>
                                </div> --}}
                            </form>
                        </div>
                        @endif
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
    <script>
      $(function () {
          // your custom javascript
      });
   </script>
@stop