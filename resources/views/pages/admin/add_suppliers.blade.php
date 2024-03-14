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
@stop

{{-- @section('ckeditor')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@stop --}}

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">Thêm Nhà Cung Cấp</div>
        <div class="card-body">
            {{-- FORM THÊM LOẠI SẢN PHẨM --}}
            <form type="form" action="{{route('addSuppliers')}}" id = "add_supp" name="contact" method="POST" data-netlify="true" enctype="multipart/form-data">
                {{-- INPUT TÊN SẢN PHẨM --}}
                <div class="form-group">
                    <label for="suppName">TÊN ĐỐI TÁC:</label>
                    <input type="text" placeholder="Tên nhà cung cấp..." class="form-control" name="suppliers_name"/>
                    <span style="color: red" class="error_suppliers_name error"></span>
                </div>
                
                {{-- INPUT LINK ẢNH SẢN PHẨM --}}
                <div class="form-group">
                    <label for="suppEmail">EMAIL ĐỐI TÁC:</label>
                    <input type="email" placeholder="Email nhà cung cấp..." class="form-control" name="suppliers_mail"/>
                    <span style="color: red" class="error_suppliers_mail error"></span>
                </div>
                <div class="form-group">
                    <label for="suppPhone">SỐ ĐIỆN THOẠI ĐỐI TÁC:</label>
                    <input type="number" placeholder="Số điện thoại nhà cung cấp..." class="form-control" name="suppliers_phonenumber"/>
                    <span style="color: red" class="error_suppliers_phonenumber error"></span>
                </div>
                <div class="form-group">
                    <label for="productName">AVATAR ĐỐI TÁC :</label>
                    @csrf
                    <div class="image">                    
                        <input type="file" class="form-control" name="suppliers_image">
                    </div>       
                    <span style="color: red" class="error_suppliers_image error"></span>       
                </div>
                <button type="submit" class="btn btn-primary">Thêm Đối Tác</button>
            </form>
            {{-- END FORM --}}
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    $(document).ready(function() {
        $('#add_supp').on('submit', function(e){
            // toastr["success"]("Thêm Thành Công", "Thông Báo")     
            e.preventDefault();                    
            
            // console.log("{{ route('addSuppliers') }}");
           //console.log(categories_name);
            // $.ajaxSetup({
            //     headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $('.error').text('');
            $.ajax({
                url: "form-addSuppliers",
                method: 'POST', 
                data: new FormData(this),
                // dataType: 'json',                
                cache: false,
                contentType: false,
                processData: false,                
                success:function(response){ 
                    toastr["success"]("Thêm "+ response.s_name+ " thành công!!!", "Thông Báo")  ;                  
                },
                error:function(error){  
                    console.log(error);            
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
