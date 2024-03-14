@extends('layouts.admin')

@section('title', 'Quản Lý Sản Phẩm')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group { padding: 2px 5px; }
        /* The Modal (background) */
        
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
    
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
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
  <div class="container py-5">
    
    <div class="row">
      <div class="col-sm"></div>
      <div class="col-sm">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct_modals">
          THÊM SẢN PHẨM MỚI
        </button>
      </div>
      <div class="col-sm"></div>
    </div>

    <table class="table table-hover datatable cell-border compact stripe" id="myTable">      
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên Sản Phẩm</th>
          <th scope="col">Hình Ảnh</th>
          <th scope="col">Loại Sản Phẩm</th>          
          <th scope="col">Nhà Cung Cấp</th>
          <th scope="col">Giá Cả</th>
          <th scope="col">Đơn Vị</th>
          <th scope="col">Nội Dung</th>
          <th scope="col">Số Lượng</th>
          <th scope="col">Ảnh Liên Quan</th>
          <th scope="col">Thay Đổi</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      
    </table>
  </div>
  
  @include('partial.modal.edit_product')
  @include('partial.modal.addProduct') 
  @include('partial.modal.ckeditor')
  @include('partial.modal.addMultiPhotosProduct')
@stop

  

@section('scripts')
    <script>
      var _token = "{{ csrf_token() }}";
      var urlStoreImages = '{{route("productimages")}}';
      var urlProductImages = "{{route('productimages')}}";
      // console.log(_token);
      var id_Product = "";
      var ListImgProduct = "{{route('ListImgProduct')}}";
      var updateProductImagesDetail="{{route('updateProductImagesDetail')}}";
    </script>
    
    <script src="{{asset('js/custom/admin/product.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{--quick defined--}}
    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    {{-- <script src="{{asset('js/custum/categories.js')}}"></script> --}}
    <script>    
    var editor1 = ClassicEditor.create(document.querySelector('#editor1'))
    .catch(error =>{
        console.error(error)
    });
      var idProduct;
      var table = $('#myTable').DataTable({
        "ajax": 'getAllProduct',
        "columns" : [
          {data: "id",
            render: (data, type, row, meta) => meta.row + 1
          },
          {data:"pro_name"},
          {data:"pro_avatar",
            render: function(data, type, row, meta){
              return '<img src="{{asset('')}}'+data+'" alt="'+row.pro_name+'" width="80px" height="100px"">'
            }
          },
          {data:"c_name"},
          {data:"s_name"},
          {data:"price"},
          {data:"type"},
          {data:"id",
            render: function(data, type, row){
              return '<button data-id="'+data+'" type="button" class="btn btn-info" data-toggle="modal" data-target="#contentModal" id="editContent"><i class="fa-solid fa-comment-dots"></i></button>'
            }
          },
          {data:"des_id",
          render: function(data, type, row){
              return '<label for="ex1">Hiện Có: '+row.quantity+'</label><input data-id="'+data+'"class="form-control" type="text">'
            }
          },
          {data:"id",
            render: function(data, type, row){
              return '<button data-id="'+data+'" onclick="addImages('+data+')" type="button" class="btn btn-success" data-toggle="modal" data-target="#multiphotosproduct" id="addmultiphotos"><i class="fa-regular fa-images"></i></button>'
            }
          },

          {data:"des_id",
            render: function(data, type, row){
              return '<button data-id="'+ row.id +"-"+data+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal" id="editProduct"><i class="fa-solid fa-pen-to-square"></i></button>'
            }
          },
          {
            data:"des_id",
            render: function(data, type, row){
              return '<button data-id="'+ data +'" type="button" class="btn btn-danger" data-id="del_'+row.id+'" id="delete" data-toggle="modal" data-target="#confirmModal"><i class="fa-solid fa-trash-can"></i></button>'
            }
          }         
        ] ,
        columnDefs: [
          {
              targets: [0,2,3,4,5,6,7,8,9],
              className: 'dt-body-center'
          },          
        ]           
      });
      //Add product
      var idDes;
      $(document).ready(function() {
        $('#Product_form').on('submit', function(e){
            e.preventDefault();                    
            $('.error').text('');
            $.ajax({
                url: 'form-addProduct',
                method: 'POST', 
                data: new FormData(this),
                // dataType: 'json',                
                cache: false,
                contentType: false,
                processData: false,                
                success:function(response){      
                  // console.log(response);   
                  if(response.success){
                    toastr["success"]("Thêm thành công!!!", "Thông Báo");   
                    table.ajax.reload();  
                    // console.log(response.arr1);   
                    // console.log(response.arr2);   
                  }else{
                    // console.log(response.success);      
                    toastr["error"]("Dữ Liệu Sai!!!", "Thất Bại");   
                  }  
                },
                error:function(error){  
                  // console.log(error);            
                    let tb = error.responseJSON.errors;
                    for(var i in tb){
                        $('.error_' + i).text(tb[i][0]);
                    }
                },                            
            });
        });
      });
      //Get Id and data Product for Update
      $(document).on('click','#editProduct',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        id = id.split('-');
        idProduct = id[0];
        // console.log(id);
        idDes = id[1];
        $.ajax({          
          url: 'getOneProduct',
          method: 'POST',
          data: {
            id:idProduct,
            idDes:id[1],
            _token: "{{ csrf_token() }}"
          },     
          success: function(data) { 
            // console.log(data);
            var cate_id = data.product[0].pro_category_id;
            var sup_id = data.product[0].supplier_id;
            $('#pro_name').val(data.product[0].pro_name);
            $('#pro_price').val(data.product[0].price);
            $('#pro_description').val(data.product[0].type);
            $('#cate_id'+ cate_id).attr('selected','true');
            $('#sup_id'+ sup_id).attr('selected','true');
          },
          error: function(error){
            console.log(error);
          }
        });
      });
      //Update
      $('#productUpdate_form').on('submit', function(e){
        e.preventDefault();
        var myData = new FormData(this);
        myData.append('id',idProduct);
        myData.append('idDes',idDes);
        $('.error').text('');
        // console.log(myData);
        $.ajax({          
          url: 'updateProduct',
          method: 'POST',
          data: myData,     
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) { 
            console.log(data );  
            toastr["success"]("Thay Đổi thành công!!!", "Thông Báo");   
            table.ajax.reload();
            $("#image").val("");           
          },
          error: function(error){
            console.log(error);
            let tb = error.responseJSON.errors;
            for(var i in tb){
                $('.error_' + i).text(tb[i][0]);
            }
          }
        });   
      });
      //get Id for Delete
      $(document).on('click','#delete',function(e){
        e.preventDefault();
        idDel = $(this).data('id');  
      });
      //Delete product
      $(document).on('click','#xacnhan',function(e){
        $.ajax({
          url: 'deleteProduct',
          method: 'POST',
          data: {
            id:idDel,
            _token: "{{ csrf_token() }}"
          },
          // contentType: false,
          // cache: false,
          // processData: false,  
          success: function(data){             
            toastr["success"]("Xóa Thành Công", "Thông Báo");
            $('#confirmModal').modal('hide');
            table.ajax.reload();  
          },
          error:function(error){
            console.log(error);
          }
        });
      });
      //get Id for Content
      var idContent;
      $(document).on('click','#editContent',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        idContent = id;
      });
      //update content product
      $('#updateContent_form').on('submit', function(e){
        e.preventDefault();
        var myData = new FormData(this);
        myData.append('id',idContent);
        $('.error').text('');
        // console.log(myData);
        
        $.ajax({          
          url: 'updateContent',
          method: 'POST',
          data: myData,     
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) { 
            console.log(data );  
            toastr["success"]("Thay Đổi thành công!!!", "Thông Báo");   
            // table.ajax.reload();
            const myTimeout = setTimeout(reload,100);
          },
          error: function(error){
            console.log(error);
            let tb = error.responseJSON.errors;
            for(var i in tb){
                $('.error_' + i).text(tb[i][0]);
            }
          }
        });   
      });
      function reload() {
        location.reload();
      }
      $('#formAddImages').on('submit',function(e) {
        e.preventDefault();
        var data = new FormData(this);
        data.append('pro_id',id_Product)
        $.ajax({
          url:urlProductImages,
          data:data,
          method: 'POST',    
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) { 
            console.log(data );  
            toastr["success"]("Thêm Ảnh Thành Công!!!", "Thông Báo");             
          },
          error: function(error){
            console.log(error);
          }
        });
      });
      var UpdateQuantityProduct = "{{route('UpdateQuantityProduct')}}"
        $(document).on("keypress", "input", function(e){
        if(e.which == 13){
          var val = $(this).val();
          var id_des = $(this).attr('data-id');
          $.ajax({
            url:UpdateQuantityProduct,
            method: 'POST',
            data:{
              _token:_token,
              num:val,
              id_des:id_des
            },
            success: function(data){
              console.log(data);
              toastr["success"]("Thay Đổi Số Lượng Thành Công!!!", "Thông Báo");
              table.ajax.reload();             
            },
            error:function(error){
              toastr["error"]("Thông Tin Bị Lỗi!!!", "Lỗi");

              console.log(error);
            }
          })
        }
      });
   </script>
   <script>
     
   </script>
   
@stop


