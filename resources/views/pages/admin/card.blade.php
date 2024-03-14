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
    
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
@stop

@section('breadcrumb')
    @include('partial.users.breadcrumb')
@stop
@section('sidebar')
    @include('partial.users.sidebar')
@stop

@section('content')
{{-- @yield('sidebar'); --}}
<div class="chart-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="chart-item table-responsive fix">
                    <table class="col-md-12">
                        <thead>
                            <tr>
                                <th class="th-product">Product</th>
                                <th class="th-details">Details</th>
                                <th class="th-edit">Edit</th>
                                <th class="th-qty">Qty</th>
                                <th class="th-price">Price</th>
                                <th class="th-total">Sub Total</th>
                                <th class="th-delate">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="th-product">
                                    <a href="#"><img src="img/cart/cart-1.jpg" alt="cart"></a>
                                </td>
                                <td class="th-details">
                                    <h2><a href="#">Baby New Style Jackets</a></h2>
                                    <div class="best-product-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                    </div>
                                    <p>Product Color : Red</p>
                                    <p>Product Code  : 2201 RS</p>
                                </td>
                                <td class="th-edit"><a href="#">Edit</a></td>
                                <td class="th-qty">
                                    <input type="number" min="1" placeholder="1">
                                </td>
                                <td class="th-price">$225.00</td>
                                <td class="th-total">$450.00</td>
                                <td class="th-delate"><a href="#"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="th-product">
                                    <a href="#"><img src="img/cart/cart-2.jpg" alt="cart"></a>
                                </td>
                                <td class="th-details">
                                    <h2><a href="#">Baby New Style Jackets</a></h2>
                                    <div class="best-product-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                    </div>
                                    <p>Product Color : Red</p>
                                    <p>Product Code  : 2201 RS</p>
                                </td>
                                <td class="th-edit"><a href="#">Edit</a></td>
                                <td class="th-qty">
                                    <input type="number" min="1" placeholder="1">
                                </td>
                                <td class="th-price">$225.00</td>
                                <td class="th-total">$450.00</td>
                                <td class="th-delate"><a href="#"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="th-product">
                                    <a href="#"><img src="img/cart/cart-3.jpg" alt="cart"></a>
                                </td>
                                <td class="th-details">
                                    <h2><a href="#">Baby New Style Jackets</a></h2>
                                    <div class="best-product-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                    </div>
                                    <p>Product Color : Red</p>
                                    <p>Product Code  : 2201 RS</p>
                                </td>
                                <td class="th-edit"><a href="#">Edit</a></td>
                                <td class="th-qty">
                                    <input type="number" min="1" placeholder="1">
                                </td>
                                <td class="th-price">$225.00</td>
                                <td class="th-total">$450.00</td>
                                <td class="th-delate"><a href="#"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart-button">
                    <button type="button" class="btn">Tiếp tục mua sắm</button>
                    <button type="button" class="btn floatright">Update Cart</button>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="cart-shopping-area fix">
                <div class="col-md-4 col-sm-4">
                    <div class="calculate-shipping chart-all">
                        <h2>CALCULATE SHIPPING</h2>
                        <p>Enter your destination to get a shipping estimate.</p>
                        <select>
                            <option>Sellect Country</option>
                            <option>America</option>
                            <option>Afganisthan</option>
                            <option>Bangladesh</option>
                            <option>Chin</option>
                            <option>Japna</option>
                        </select>
                        <select>
                            <option>State/Provinence</option>
                            <option>Dhaka</option>
                            <option>Borishal</option>
                            <option>Gajipur</option>
                            <option>Kustiya</option>
                            <option>Vola</option>
                            <option>Gaibandha</option>
                        </select>
                        <input type="text" placeholder="Zip / Post Code">
                        <button type="button" class="btn">Get A Quote</button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="chart-all">
                        <h2>PROMOTIONAL CODE</h2>
                        <p>Enter your destination to get a shipping estimate.</p>
                        <input type="text" placeholder="Zip / Post Code">
                        <button type="button" class="btn">Get A Quote</button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="shopping-summary chart-all">
                        <div class="shopping-cost-area">
                            <h2>SHOPPING BAG SUMMARY</h2>
                            <div class="shopping-cost">
                                <div class="shopping-cost-left">
                                    <p>Sub Total </p>
                                    <p>GRAND TOTAL </p>
                                </div>
                                <div class="shopping-cost-right">
                                    <p>$2.010.00</p>
                                    <p>$2.010.00</p>
                                </div>
                            </div>
                            <button type="button" class="btn">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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

