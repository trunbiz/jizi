<!-- The Modal -->
  <!-- Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN SẢN PHẨM</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('updateProduct')}}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="productUpdate_form">
        <div class="modal-body">
          {{-- Form cập nhật  --}}          
            @csrf
            {{-- Name --}}
            <div class="form-group">
              <label for="product_name-name" class="col-form-label">Tên Hàng Hóa:</label>
              <input type="text" class="form-control" id="pro_name" name="pro_name">
              <span style="color: red" class="error_pro_name error"></span>
            </div>
            {{-- Categories --}}
            <div class="form-group">
                <label for="categories_name-name" class="col-form-label">Loại Sản Phẩm: </label>
                <select class="form-select" aria-label="Default select example" name="pro_categories_id">
                    @if(!empty($dataCategories))                        
                        @foreach($dataCategories as $categories)
                            <option value="{{$categories->id}}" id="cate_id{{$categories->id}}" >{{$categories->c_name}}</option>
                        @endforeach
                    @else
                        <option value="null">Null</option>
                    @endif
                </select>  
            </div>
            {{-- Supplier --}}
            <div class="form-group">
                <label for="categories_name-name" class="col-form-label">Nhà Cung Cấp: </label>
                <select class="form-select" aria-label="Default select example" name="pro_suppliers_id">
                    @if(!empty($dataSuppliers))                        
                        @foreach($dataSuppliers as $suppliers)
                            <option value="{{$suppliers->id}}" id="sup_id{{$suppliers->id}}" >{{$suppliers->s_name}}</option>
                        @endforeach
                    @else
                        <option value="null">Null</option>
                    @endif
                </select>
            </div>
            {{-- Image --}}
            <div class="form-group">
              <label for="categories_image" class="col-form-label">Hình Ảnh Mới:</label>
              <input type="file" name="image" id="image">
            </div>
            {{-- Price --}}
            <div class="form-group">
                <label for="categories_name-name" class="col-form-label">Giá Tiền: </label>
                <input type="text" class="form-control" id="pro_price" name="pro_price">
                <span style="color: red" class="error_pro_price error"></span>
            </div>
            {{-- Desription --}}
            <div class="form-group">
                <label for="categories_name-name" class="col-form-label">Đơn Vị Tính: </label>
                <input type="text" class="form-control" id="pro_description" name="pro_description" placeholder="Kg,Con,Khay,Túi..." value="Kg">
                <span style="color: red" class="error_pro_description error"></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">Close</button>
          <button type="submit" class="btn btn-primary" id="Update">Send message</button>
        </div>
      </form>
      </div>
    </div>
  </div>