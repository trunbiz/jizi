<!-- Modal -->
<div class="modal fade" id="addProduct_modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">THÊM SẢN PHẨM MỚI</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('addProduct') }}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="Product_form">
        <div class="modal-body">
          {{-- Form thêm  --}}          
            @csrf
            {{-- Name Product --}}
            <div class="form-group">
              <label for="categories_name-name" class="col-form-label">Tên Sản Phẩm: </label>
              <input type="text" class="form-control" id="pro_name" name="pro_name">
              <span style="color: red" class="error_pro_name error"></span>
            </div>
            {{-- Categories --}}
            <div class="form-group">
                <label for="categories_name-name" class="col-form-label">Loại Sản Phẩm: </label>
                <select class="form-select" aria-label="Default select example" name="pro_categories">
                    @if(!empty($dataCategories))                        
                        @foreach($dataCategories as $categories)
                            <option value="{{$categories->id}}">{{$categories->c_name}}</option>
                        @endforeach
                    @else
                        <option value="null">Null</option>
                    @endif
                </select>  
            </div>
            {{-- Suppliers --}}
            <div class="form-group">
                <label for="categories_name-name" class="col-form-label">Nhà Cung Cấp: </label>
                <select class="form-select" aria-label="Default select example" name="pro_suppliers">
                    @if(!empty($dataSuppliers))                        
                        @foreach($dataSuppliers as $suppliers)
                            <option value="{{$suppliers->id}}">{{$suppliers->s_name}}</option>
                        @endforeach
                    @else
                        <option value="null">Null</option>
                    @endif
                </select>
            </div>
            {{-- Image --}}
            <div class="form-group">
              <label for="categories_image" class="col-form-label">Ảnh Đại Diện Cho Sản Phẩm:</label>
              <input type="file" name="image" id="image">
              <span style="color: red" class="error_image error"></span>
            </div>
            {{-- Description --}}
            <div class="form-group">
              <label for="categories_name-name" class="col-form-label">Đơn Vị Tính: </label>
              <input type="text" class="form-control" id="pro_description" name="pro_description" placeholder="Kg,Con - Nếu muốn nhiều lựa chọn thì nhập cách nhau dấu ," >
              <span style="color: red" class="error_pro_description error"></span>
            </div>
            {{-- Price --}}
            <div class="form-group">
                <label for="categories_name-name" class="col-form-label">Giá Tiền: </label>
                <input type="text" class="form-control" id="pro_price" name="pro_price" placeholder="VNĐ - Nếu có nhiều lựa chọn thì nhập cách nhau dấu ,">
                <span style="color: red" class="error_pro_price error"></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">ĐÓNG</button>
          <button type="submit" class="btn btn-primary" id="Update">THÊM MỚI</button>
        </div>
      </form>

      </div>
    </div>
  </div>