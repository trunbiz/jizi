<!-- Modal -->
<div class="modal fade" id="addCategories_modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm Loại Sản Phẩm Mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="{{ route('updateCategories') }}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="categoriesAdd_form">
        <div class="modal-body">
          {{-- Form thêm  --}}          
            @csrf

            <div class="form-group">
              <label for="categories_name-name" class="col-form-label">Tên Loại Hàng Hóa:</label>
              <input type="text" class="form-control" id="categories_name" name="categories_name">
              <span style="color: red" class="error_categories_name error"></span>
            </div>

            <div class="form-group">
              <label for="categories_image" class="col-form-label">Đổi Ảnh Mới:</label>
              <input type="file" name="image" id="image">
              <span style="color: red" class="error_image error"></span>
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