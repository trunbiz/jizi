@extends('layouts.admin')

@section('title', 'Quản Lý Loại Hàng')

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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategories_modals">
          THÊM LOẠI SẢN PHẨM MỚI
        </button>
      </div>
      <div class="col-sm"></div>
    </div>

    <table class="table table-hover datatable cell-border compact stripe" id="myTable">      
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên</th>
          <th scope="col">Ảnh</th>          
          <th scope="col">Thay Đổi</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      {{-- <tbody> --}}
        {{-- @if(!empty($dataCategories))
          @php
            $n = 1;
          @endphp
          @foreach($dataCategories as $c)
            @csrf
            <tr class="listContent">
              <th scope="row">{{ $n++ }}</th>
              <td id="item_{{$c->id}}" >{{$c->c_name }}</td>
              <td><img src="{{asset($c->c_avatar)}}" alt="" width="80px" height="100px" id="img_categories_{{$c->id}}"></td>              
              <td><button data-id="{{$c->id}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="editCategories"  >Sửa Thông Tin</button></td>
              <td><button data-id="{{$c->id}}" type="button" class="btn btn-danger" data-id="del_{{$c->id}}" id="delete" data-toggle="modal" data-target="#confirmModal"><b>Xóa</b></button></td>
            </tr>
          @endforeach
        @else
          <tr>
            <th scope="row">null</th>
            <td>null</td>
            <td>nulll</td>
            <td>null</td>
          </tr>
        @endif --}}
      {{-- </tbody>       --}}
    </table>
  </div>
  
  @include('partial.modal.edit_categories')
  @include('partial.modal.addCategories')
@stop

  

@section('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{--quick defined--}}
    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    {{-- <script src="{{asset('js/custum/categories.js')}}"></script> --}}
    <script>
      var id_global;
      var idName ;
      var url = '{{ URL::asset('') }}';
      var idImages;
      var idDel;
      var temp = 1 ;

      var table = $('#myTable').DataTable({
        "ajax": 'allCategories',
        "columns" : [
          {data: "id",
            render: (data, type, row, meta) => meta.row + 1
          },
          {
            data: 'c_name',
            render: function(data, type, row){
              return '<b id="item_'+row.id+'">'+data+'</b>'
            }
          },
          {
            data: 'c_avatar',
            render: function(data, type, row){
              return '<img src="{{asset('')}}'+data+'" alt="" width="80px" height="100px" id="img_categories_{{'row.id'}}">'
            }
          },
          {
            data: 'c_active',
            render: function(data, type, row){
              return '<button data-id="'+ row.id +'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="editCategories"><i class="fa-solid fa-pen-to-square"></i></button>'
            }
          },
          {data: 'c_active',
            render: function(data, type, row){
              return '<button data-id="'+ row.id +'" type="button" class="btn btn-danger" data-id="del_'+row.id+'" id="delete" data-toggle="modal" data-target="#confirmModal"><i class="fa-solid fa-trash-can"></i></button>'
            }
          },
        ], 
        columnDefs: [
          {
              targets: [2,3,4],
              className: 'dt-body-center'
          }
        ]           
      });

      //end edit record
      // Get the modal
      var modal = document.getElementById("myModal");
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks on the button, open the modal
      //Xử lý bằng ajax       
      $(document).on('click','#editCategories',function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        id_global = id;
        //lấy tên loại sản phẩm theo  id
        var getName = $(this).closest('.listContent').find('#item_'+id); 
        //lấy class tên loại sản phẩm
        // idName = getName[0].id;
        //lấy id image
        getIdImage = $("#img_categories_"+id);       
        // idImages = getIdImage[0].id;

        console.log(getName);
        $.ajax({
          url: 'getOneCategories',
          method: 'POST',
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
          },
          success: function(data) {            
            let avatar = url + data.categories[0].c_avatar;                    
            $('#categories_name').val(data.categories[0].c_name);
            $("#categories_image").attr("src",avatar);            
          },
          error: function(error){
            console.log(error);
          }
        });       
        //     modal = "block"; //modal.style.display        
      });
      // Update data
      $('#categoriesUpdate_form').on('submit', function(e){
        e.preventDefault();
        //lấy tên
        var c_name = $(this).find('input[name="c_name"]').val();
        //lấy images
        let new_img = $(this).find('input[name="new_img"]').val();
        // console.log(new_img);
        
        $('.error').text('');
        
        //biến item là tên của loại sản phẩm, khi update ta sẽ đổi tên luôn
        var item = idName;
        var a = new FormData(this);
        a.append('id',id_global);        
        $.ajax({          
          url: 'updateCategories',
          method: 'POST',
          data: a,     
          contentType: false,
          cache: false,
          processData: false,     
          success: function(data) { 
            toastr["success"]("Cập Nhật Thành Công", "Thông Báo");
            table.ajax.reload();  
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

      //Get ID Delete categories
      $(document).on('click','#delete',function(e){
        e.preventDefault();
        idDel = $(this).data('id');   
      });
      //Delete categories
      $(document).on('click','#xacnhan',function(e){
        $.ajax({
          url: 'deleteCategories',
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
            table.ajax.reload();  
          },
          error:function(error){
            console.log(error);
          }
        });
      });
      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }

      $(document).ready(function() {
        $('#categoriesAdd_form').on('submit', function(e){
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
                    toastr["success"]("Thêm "+ categories_name+ " thành công!!!", "Thông Báo");   
                    table.ajax.reload();               
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
      });
   </script>
@stop


