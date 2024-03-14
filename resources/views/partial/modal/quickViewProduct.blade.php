{{-- MODAL --}}
<!-- MODAL -->
<div class="modal fade" id="quick_view_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN SẢN PHẨM</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- START BODY --}}
        <form type="form" name="order" method="POST" action="{{route('orderProduct')}}"
        data-netlify="true" enctype="multipart/form-data" id="formOrder">
        @csrf
        <div class="modal-body">
          {{-- <div class="col-md-9 col-sm-8"> --}}
          <div class="row">
              <div class="col-md-5 col-sm-5">
                  <div class="product-item-tab">
                      <!-- Tab panes -->
                      <div class="single-tab-content">
                          <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="img-one"><img src="img/single-product/single-product-1.jpg" alt="tab-img" id="img_main" ></div>
                              {{-- <div role="tabpanel" class="tab-pane" id="img-two"><img src="img/single-product/single-product-2.jpg" alt="tab-img"></div>
                              <div role="tabpanel" class="tab-pane" id="img-three"><img src="img/single-product/single-product-1.jpg" alt="tab-img"></div> --}}
                          </div>
                      </div>
                      <!-- Nav tabs -->
                        <div class="single-tab-img">
                            <ul class="nav nav-tabs" role="tablist" id="single-img">
                                {{-- <li role="presentation" class="active"><a href="#img-one" role="tab" data-toggle="tab"><img src="img/single-product/s1.jpg" alt="tab-img"></a></li>
                                <li role="presentation" class="active"><a href="#img-one" role="tab" data-toggle="tab"><img src="img/single-product/s1.jpg" alt="tab-img"></a></li>
                                <li role="presentation" class="active"><a href="#img-one" role="tab" data-toggle="tab"><img src="img/single-product/s1.jpg" alt="tab-img"></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7">
                    <div class="product-tab-content">
                        <div class="product-tab-header">
                            <h1 id="name_product">Baby New Style Jackets</h1>
                            <div class="best-product-rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <p>(3 Đánh Giá)</p>
                            </div>
                            <h3 id="pro_price"></h3>
                        </div>
                        <div class="product-item-code">
                            {{-- <p>Item Code  :   #897896</p> --}}
                            <p id="pro_status" >Tình Trạng :  Còn Hàng</p>
                        </div>
                        <div class="product-item-details" id="content">
                        </div>
                        <div class="size-chart">
                          <p>Số Lượng:
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                            </p>                          
                        </div>
                        
                        <div class="available-option">
                            <h2 >Chọn:</h2>
                            <div id="optional">
                            </div>                          
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        {{-- END BODY --}}
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">Đóng</button>
          <button type="submit" data-id ='idProduct' class="btn btn-primary" id="OrderProduct">Đặt Hàng</button>
        </div>
        </form>
      </div>
    </div>
  </div>