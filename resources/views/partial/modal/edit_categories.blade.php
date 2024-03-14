<!-- The Modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('updateCategories') }}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="categoriesUpdate_form">
        <div class="modal-body">
          {{-- Form cập nhật  --}}          
            @csrf
            <div class="form-group">
              <label for="categories_name-name" class="col-form-label">Tên Loại Hàng Hóa:</label>
              <input type="text" class="form-control" id="categories_name" name="c_name">
              <span style="color: red" class="error_c_name error"></span>
            </div>

            <div class="form-group">
              <label for="categories_image" class="col-form-label">Hình Ảnh:</label>
              <img src="Hi" alt="" id="categories_image" width="80px" height="100px">
            </div>

            <div class="form-group">
              <label for="categories_image" class="col-form-label">Đổi Ảnh Mới:</label>
              <input type="file" name="new_img" id="new_img">
              <span style="color: red" class="error_new_img error"></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">Close</button>
          <button type="submit" class="btn btn-primary" id="Update" >Send message</button>
        </div>
      </form>
      </div>
    </div>
  </div>