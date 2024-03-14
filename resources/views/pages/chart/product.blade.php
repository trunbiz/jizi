@extends('layouts.login')

@section('title', 'Thống kê sản phẩm')


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
            <div class="d-inline-flex p-2">
                <button type="button" class="btn btn-primary" style="max-height: 200px">
                    Tổng Số Sản Phẩm <span class="badge badge-light" id="total_product">{{$total->soluong}}</span>
                </button>
            </div>
            <div width="200px" height="200px">
                <canvas id="Cate" style="max-width: 1000px;max-height: 300px"></canvas>
            </div>

            <div class="d-inline-flex p-2">
                <button type="button" class="btn btn-primary" style="max-height: 200px">
                    Số sản phẩm bán trong tháng <span class="badge badge-light" id="total_product"></span>
                </button>
            </div>
            <div width="200px" height="200px">
                <canvas id="Product-Sold-Month" style="max-width: 1000px;max-height: 300px"></canvas>
            </div>

            <div class="d-inline-flex p-2">
                <button type="button" class="btn btn-primary" style="max-height: 200px">
                    10 Sản Phẩm Bán Chạy Trong Tháng <span class="badge badge-light" id="total_product"></span>
                </button>
            </div>
            <div width="200px" height="200px">
                <canvas id="Top_10_Sales" style="max-width: 1000px;max-height: 300px"></canvas>
            </div>

            <div class="d-inline-flex p-2">
                <button type="button" class="btn btn-primary" style="max-height: 200px">
                    Doanh Thu Trong Tháng <span class="badge badge-light"></span>
                </button>
            </div>
            <div width="200px" height="200px">
                <canvas id="total_money" style="max-width: 1000px;max-height: 300px"></canvas>
            </div>
        </div>
    </div> 
    <!-- / .container -->
</section>
@stop

@section('scripts')
    <script>
        var getDataProduct = "{{route('getDataProduct')}}";
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/custom/chart/product.js')}}"></script>

@stop
