<!-- Modal -->
<div class="modal fade" id="addSuppliers_modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm Nhà Phân Phối Mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="{{route('addSuppliers')}}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="addSuppliers_form">
        <div class="modal-body">
          {{-- Form thêm  --}}          
            @csrf

            <div class="form-group">
              <label class="col-form-label">Tên Nhà Phân Phối:</label>
              <input type="text" class="form-control" id="suppliers_name" name="suppliers_name">            
                <span style="color: red" class="error_suppliers_name error"></span>
            </div>
            <div class="form-group">
                <label class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="suppliers_mail" name="suppliers_mail">
                <span style="color: red" class="error_suppliers_mail error"></span>
              </div>
            <div class="form-group">
                <label class="col-form-label">Số điện thoại:</label>
                <input type="text" class="form-control" id="suppliers_phone" name="suppliers_phonenumber">
                <span style="color: red" class="error_suppliers_phonenumber error"></span>
            </div>  
            <div class="form-group">
              <label class="col-form-label">Ảnh</label>
              <input type="file" name="suppliers_avt" id="suppliers_image">
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

  {{-- edit supplier --}}
