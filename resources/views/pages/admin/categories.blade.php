@extends('layouts.admin')

@section('title', 'Danh mục sản phẩm')
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
    <script src="{{asset('js/notify.js')}}"></script>
    <script src="{{asset('js/notify.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
@stop

{{-- @section('ckeditor')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@stop --}}

@section('content')
<div class="container py-5">
    <div class="card">
        @if (session('sucess'))
            <div style="color:green">{{session('sucess')}}</div>
        @elseif (session('false'))
            <div style="color:red">{{session('false')}}</div>
        @endif
        <div class="card-header">Thêm Loại Sản Phẩm</div>
        <div class="card-body">
            {{-- FORM THÊM LOẠI SẢN PHẨM --}}
            <form type="form" action="{{ route('addCategories') }}" name="contact" method="POST" 
            data-netlify="true" enctype="multipart/form-data" id="categories_form">
            @csrf
                {{-- Thông báo thêm thành công --}}
                @if(session('success'))
                    <div style="color: green">{{session('success')}}</div>
                @endif
                {{-- INPUT TÊN SẢN PHẨM --}}
                <div class="form-group">
                    <label for="productName">TÊN LOẠI SẢN PHẨM:</label>
                    <input type="text" placeholder="Tên sản phẩm..." class="form-control" name="categories_name"/>                    
                    <span style="color: red" class="error_categories_name error"></span>
                   
                </div>
                
                {{-- INPUT LINK ẢNH SẢN PHẨM --}}
                <div class="form-group">
                    <label for="productName">AVATAR :</label>                    
                    <div class="image">                    
                        <input type="file" class="form-control" required name="image">
                        <span style="color: red" class="error_image error"></span> 
                    </div>       
                             
                </div>
                {{-- Load Ảnh Lên --}}
                {{-- <div class="form-group">
                    @if ($message = Session::get('success'))                    
                        <img src="{{ asset('img\categories\{{ Session::get('image')}}') }}" alt="">                    
                    @endif   
                </div> --}}
                {{-- BUTTON SUBMIT --}}
                <button type="submit" class="btn btn-primary">Thêm Loại Sản Phẩm</button>
            </form>
            {{-- END FORM --}}
        </div>           
    </div>
</div>
@stop

@section('scripts')
    <script> 
    $(document).ready(function() {
        $('#categories_form').on('submit', function(e){
            // toastr["success"]("Thêm Thành Công", "Thông Báo")     
            e.preventDefault();                    
            let actionUrl = $(this).attr('action');
            let categories_name = $(this).find('input[name="categories_name"]').val();
            let image = $(this).find('input[name="image"]').val();
            let _token = $(this).find('input[name="_token"]').val();
            // console.log(categories_name);
            // $.ajaxSetup({
            //     headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $('.error').text('');
            $.ajax({
                url: 'addCategories',
                method: 'POST', 
                data: new FormData(this),
                // dataType: 'json',                
                cache: false,
                contentType: false,
                processData: false,                
                success:function(response){                   
                    toastr["success"]("Thêm "+ categories_name+ " thành công!!!", "Thông Báo")  ;                  
                },
                error:function(error){              
                    let tb = error.responseJSON.errors;
                    for(var i in tb){
                        $('.error_' + i).text(tb[i][0]);
                    }
                },
                            
            });
            // alert(categoriesAvatar);
        });
    })
    </script>
@stop
