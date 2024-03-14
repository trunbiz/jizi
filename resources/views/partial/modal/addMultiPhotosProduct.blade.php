
<!-- MODAL -->
<div class="modal fade" id="multiphotosproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ẢNH CHI TIẾT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- START BODY --}}
        <div id="conten_img">
            Ảnh Chi Tiết Cho Sản Phẩm
        </div>
        <form type="form" name="order" method="POST" action="{{route('productimages')}}"
        data-netlify="true" enctype="multipart/form-data" id="formAddImages">
        @csrf
        <div class="modal-body">
          <input type="file" id="files" name="files[]" multiple>
        </div>
        {{-- END BODY --}}
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">Đóng</button>
          <button type="submit" class="btn btn-primary" id="AddImages">Thêm Ảnh</button>
        </div>
        </form>
      </div>
    </div>
  </div>