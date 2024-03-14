@extends('layouts.master')

@section('title', 'Trang Chủ')

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
    <style>
		.bdsale{
			border: 1px solid #ff424e;
			background-color: #fff0f1;
			color: #ff424e;
			line-height: 18px;
			font-size: 14px;
			padding: 0px 4px;
		}
	</style>
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

@stop

@section('breadcrumb')
    @include('partial.users.breadcrumb')
@stop

@section('sidebar')
    @include('partial.users.sidebar')
@stop
	
@section('content')
@yield('sidebar');
    <div class="main-content" >
        <div class="top-page"> 
		<!-- this is content -->           
		<!-- Product AREA -->
		<div class="product-area" >
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="product-catagori-area" >
							<div class="product-categeries">
								<h2>DANH MỤC</h2>
								<div class="panel-group" id="accrodian">
									{{-- START CATEGORIES --}}
									@if(!empty($dataCategories))
									@foreach ($dataCategories as $cate)
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<i class="fa-solid fa-leaf"></i> 
												<a class="collapsed" href="#cate_{{$cate->id}}">{{$cate->c_name}}</a>
											</h4>
										</div>
										{{-- <div class="panel-collapse collapse" id="colOne">
											<div class="panel-body">
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-1</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-2</a>
												<a href="#"><i class="fa fa-angle-double-right"></i> Categori-3</a>
											</div>
										</div> --}}
									</div>
									@endforeach
									@endif
									{{-- END CATEGORIES --}}
								</div>
							</div>
							<!--<div class="best-seller-area">
								<h2 class="header-title">ĐỀ XUẤT CHO BẠN</h2>
								@if(!empty($dexuat))
								@php
									$idOld = ""; 	
								@endphp
								@foreach ($dexuat as $item)
								@if($item->id != $idOld)
								@php
									$idOld = $item->id;	
								@endphp
								<div class="best-sell-product">
									<div class="best-product-img">
										{{-- Ảnh của phần best sale!! nên đặt chiều cao và rộng là: 80 71 --}}
										<a href="{{route('showProductDetailById',['id'=>$item->id])}}"><img src="{{asset('')}}{{$item->pro_avatar}}" alt="product" style="max-width: 71px; height: 80px"></a>
									</div>
									<div class="best-product-content">
										<h2><a href="{{route('showProductDetailById',['id'=>$item->id])}}">{{$item->pro_name}}</a></h2>
										<h3>
											<span style="color: #129FD8 ;font-size: 16px">{{number_format($item->price, 0, ',', '.') . "đ"}}/ 
												<span style="color: #7A7A7A; font-size: 10px">{{$item->type}}</span>
											</span>
										</h3>
										<div class="best-product-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>
									</div>
								</div>
								@endif
								@endforeach
								@endif								
								{{-- <p class="view-details">
									<a href="#">Xem chi tiết</a>
								</p> --}}
							</div>-->
							{{-- <div class="add-kids single-add">
								<a href="#"><img src="{{asset('img/product/tom/tom.jpg')}}" alt="add"></a>
							</div> --}}
							{{-- <div class="testmonial-area fix">
								<h2 class="header-title">Testimonial</h2>
								<div id="owl-testmonial" class="owl-carousel">
									<div class="testmonial fix">
										<span><i class="fa fa-quote-left"></i></span>
										<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
										<h3>-MatthE Jensen</h3>
										<img src="img/testmonial.jpg" alt="">
									</div>
									<div class="testmonial fix">
										<span><i class="fa fa-quote-left"></i></span>
										<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
										<h3>-MatthE Jensen</h3>
										<img src="img/testmonial.jpg" alt="">
									</div>
								</div>
							</div> --}}
							{{-- <div class="subscribe-area">
								<h2>Subscribe Letter</h2>
								<form action="#">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Enter your E-mail">
										<button type="button" class="btn"><i class="fa fa-envelope-o"></i></button>
									</div>
								</form>
							</div> --}}
						</div>
					</div>					
					<div class="col-md-9 col-sm-8 ">
						<div class="product-items-area">
							<div class="arrivals-area single-add">
								
							</div>
							{{-- START SALE --}}
							@if (count($product_sale) != 0 )
							<div class="product-items">
								<h2 class="product-header">KHUYẾN MÃI KHỦNG</h2>
								<div class="row">
									<div id="product-slider" class="owl-carousel ">
										@php
											$idOld = ""; 	
										@endphp
										@foreach ($product_sale as $item)
										@if($item->id != $idOld)
										@php
											$idOld = $item->id;	
										@endphp
										<div class="col-md-4 ">
											<div class="single-product bgimg">
												<div class="single-product-img ">
													<a href="{{route('showProductDetailById',['id'=>$item->id])}}">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img " src="{{asset('')}}{{$item->pro_avatar}}" alt="product" >
														{{-- <img class="primary-img" src="img/product/single-product-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/kids-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<button onclick="nextPageProduct('{{route('showProductDetailById',['id'=>$item->id])}}')" class="btn btn-outline-warning"><i class="fa fa-external-link"></i></button>
														<button data-id="{{$item->id}}" class="btn btn-outline-warning" id="productItem" data-toggle="modal" data-target="#quick_view_product"><i class="fa fa-shopping-cart"></i></button>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h5><a href="#" style="color:black">{{$item->pro_name}} </a></h5>	
														<span style="color: #129FD8 ;font-size: 16px">{{number_format(($item->price*(100-$item->discount))/100, 0, ',', '.') . "đ"}}/ 
															<span style="color: #7A7A7A; font-size: 10px">{{$item->type}}</span>
														</span>
														<br>
														<del>
															<span style="color: #129FD8 ;font-size: 16px">{{number_format($item->price, 0, ',', '.') . "đ"}}/ 
																<span style="color: #7A7A7A; font-size: 10px">{{$item->type}}</span>
															</span>
														</del>
														
													</div>
													<div class="product-content-right" style="float: right; text-align: right-bottom">
														<span style=" color: white; background-color: red; padding: 3px"><b>- {{$item->discount}}%</b></span>
													</div>
												</div>
											</div>
										</div>
										@endif
										@endforeach
									</div>
								</div>
							</div>							
							@endif
							<div class="arrivals-area single-add">
								<!--<a href="#"> <img src="img/banner/banner09.png" alt="arrivals"> </a>-->
							</div>
							{{-- Ban Chay --}}
							@if(!empty($muanhieu))
							<div class="product-items">
								<h2 class="product-header">MUA NHIỀU NHẤT</h2>
								<div class="row">
									<div id="product-slider" class="owl-carousel ">
										@php
											$idOld = ""; 	
										@endphp
										@foreach ($muanhieu as $item)
										@if($item->id != $idOld)
										@php
											$idOld = $item->id;	
										@endphp
										<div class="col-md-4 ">
											<div class="single-product bgimg">
												<div class="single-product-img ">
													<a href="{{route('showProductDetailById',['id'=>$item->id])}}">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img " src="{{asset('')}}{{$item->pro_avatar}}" alt="product" >
														{{-- <img class="primary-img" src="img/product/single-product-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/kids-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<button onclick="nextPageProduct('{{route('showProductDetailById',['id'=>$item->id])}}')" class="btn btn-outline-warning"><i class="fa fa-external-link"></i></button>
														<button data-id="{{$item->id}}" class="btn btn-outline-warning" id="productItem" data-toggle="modal" data-target="#quick_view_product"><i class="fa fa-shopping-cart"></i></button>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h5><a href="#" style="color:black">{{$item->pro_name}} </a></h5>
														<br>
														<span style="color: #129FD8 ;font-size: 16px">{{number_format($item->price, 0, ',', '.') . "đ"}}/ 
															<span style="color: #7A7A7A; font-size: 10px">{{$item->type}}</span>
														</span>
													</div>													
												</div>
											</div>
										</div>
										@endif
										@endforeach
									</div>
								</div>
							</div>
							@endif
							<div class="arrivals-area single-add">
								<a href="#"> <img src="img/banner/banner.png" alt="arrivals"> </a>
							</div>
							{{-- Start Product --}}
							@if(!empty($dataCategories) && !empty($dataProduct))
							@foreach ($dataCategories as $cate)
							<div class="product-items">
								<h2 class="product-header" id="cate_{{$cate->id}}">{{$cate->c_name}}</h2>
								<div class="row">
									<div id="product-slider" class="owl-carousel">
										@php
											$idOld = ""; 	
										@endphp
									@foreach ($dataProduct as $item)
										@if($cate->id == $item->pro_category_id && $item->product_id != $idOld)
										@php
											$idOld = $item->product_id;
										@endphp
										<div class="col-md-4">
											<div class="single-product">
												<div class="single-product-img">
													<a href="{{route('showProductDetailById',['id'=>$item->id])}}">
														{{-- Ảnh Sản Phẩm  --}}
														<img class="primary-img" src="{{asset('')}}{{$item->pro_avatar}}" alt="product">
														{{-- <img class="primary-img" src="img/product/single-product-1.jpg" alt="product">
														<img class="secondary-img" src="img/product/kids-1.jpg" alt="product"> --}}
													</a>
													<div class="single-product-action">
														<button onclick="nextPageProduct('{{route('showProductDetailById',['id'=>$item->id])}}')" class="btn btn-outline-warning"><i class="fa fa-external-link"></i></button>
														<button data-id="{{$item->id}}" class="btn btn-outline-warning" id="productItem" data-toggle="modal" data-target="#quick_view_product"><i class="fa fa-shopping-cart"></i></button>
													</div>
												</div>
												<div class="single-product-content">
													<div class="product-content-left">
														<h5><a href="#" style="color:black">{{$item->pro_name}}</a></h5>														
														<span style="color: #129FD8">{{number_format($item->price, 0, ',', '.') . " vnđ"}}/ {{$item->type}}
															<span style="color: #7A7A7A; font-size: 10px"></span>
														</span>
													</div>
													{{-- <div class="product-content-right">
													 	<h3>$27.00</h3>
													</div> --}}
												</div>
											</div>
										</div>
										@endif
									@endforeach	
									</div>
								</div>
							</div>
							@endforeach
							@endif
							{{-- End Product --}}
							{{-- banner --}}
							<div class="arrivals-area single-add">
								{{--<a href="#"> <img src="img/banner/banner25.png" style="height:150px;" alt="arrivals"> </a>--}}
							</div>
							{{-- end banner --}}
						</div>
					</div>
				</div>
			</div>
		</div>
        </div>
   </div>
@stop

@section('modal')
	@include('partial.modal.quickViewProduct')
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{--quick defined--}}
	{{-- <script src="{{asset('js/custom/home.js')}}"></script> --}}
	<script>
		var orderProduct = "{{route('orderProduct')}}"
		var getDesById = "{{route('getDesById')}}";
		var _token = "{{ csrf_token() }}";
		var urlGetQuantityOrder = "{{route('getQuantityOrder')}}";
		var urlTransferDataOrder = "{{route('transferDataOrder')}}";
		var getProductById = "{{route('getProductById')}}";
		
	</script>

@stop
