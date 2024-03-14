<!-- Modal -->
<div class="modal fade" id="contentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NỘI DUNG</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('addSuppliers')}}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="updateContent_form">
        <div class="modal-body">
          {{-- Form thêm  --}}          
            @csrf
            <div class="form-group">
                <label for="descriptions">THÔNG TIN SẢN PHẨM:</label>
                <textarea name="pro_content" rows="5" class="form-control" id="editor1"></textarea>
                <span style="color: red" class="error error_pro_content"></span> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">ĐÓNG</button>
          <button type="submit" class="btn btn-primary" id="Update">THÊM NỘI DUNG</button>
        </div>
      </form>
      </div>
    </div>
  </div>