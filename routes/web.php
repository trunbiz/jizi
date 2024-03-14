<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\Process_accout;
use App\Http\Controllers\Admin\manageController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Models\Users\Process;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\Order;
use App\Http\Controllers\user\Bill;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ManageOrder;
use App\Http\Controllers\Chart\ProductController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\Title;
// use App\Http\Controllers\Process_accout;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('/')->group( function(){
    //page main
    Route::get('/' , [HomeController::class,'get_product'])->name('home');
    Route::get('/home' , [HomeController::class,'get_product'])->name('returnhome');

    //get Product by id
    Route::get('getProductById', [Order::class,'getProductById'])->name('getProductById');
    //show product detail by id
    Route::get('chi-tiet-san-pham/{id}', [Order::class,'showProductDetailById'])->name('showProductDetailById');

    Route::get('getDesById',[Order::class,'getDesById'])->name('getDesById');
    //user order product
    Route::post('orderProduct',[Order::class,'orderProduct'])->name('orderProduct');
    // show bill
    Route::get('bill',[Bill::class,'showBill'])->name('showBill');
    //show check out
    Route::get('checkout',[Bill::class,'showCheckOut'])->name('showCheckOut');
    //order confirmation
    Route::post('orderConfirm',[Bill::class,'orderConfirm'])->name('orderConfirm');
    //get Data Bill Place
    Route::get('dataBill',[Bill::class,'dataBill'])->name('dataBill');
    //delete product placed
    Route::get('deleteProductPlace',[Bill::class,'deleteProductPlace'])->name('deleteProductPlace');
    //get data bill placed
    Route::get('dataBillPlace',[Bill::class,'dataBillPlace'])->name('dataBillPlace');
    //show bill placed
    Route::get('dang-dat',[Bill::class,'showBillPlaced'])->name('showBillPlaced');
    //show bill detail placed
    Route::get('showBillPlaceWithIdUser',[Bill::class,'showBillPlaceWithIdUser'])->name('showBillPlaceWithIdUser');
    
    //get quantity order
    Route::get('getQuantityOrder',[Order::class,'getQuantityOrder'])->name('getQuantityOrder');
    //transfer data order
    Route::get('transferDataOrder',[Order::class,'transferDataOrder'])->name('transferDataOrder');
    //get Price By Id
    Route::get('getPriceById',[Order::class,'getPriceById'])->name('getPriceById');

    //search bar
    Route::get('tim-kiem',[HomeController::class,'search'])->name('searchProduct');

    //change password page
    Route::get('doi-mat-khau',[HomeController::class,'changePasswordPage'])->name('changePasswordPage');

    //update new password 
    Route::post('doi-mat-khau',[HomeController::class,'UpdatePassword'])->name('UpdatePassword');
    
});

Route::prefix('admin')->group( function(){
    //login admin
    Route::get('/', [manageController::class,'form_login'])->name('adminLogin');
    Route::post('/', [manageController::class,'login_admin'])->name('adminLogin');
    //register Admin
    Route::get('register', [manageController::class,'form_register'])->name('form_Register');
    Route::post('register', [manageController::class,'register_admin'])->name('adminRegister');
    //dang ky nhan vien
    Route::get('dang-ky-nhan-vien',[manageController::class,'form_register_nv'])->middleware('checkLogin')->name('form_register_nv');
    Route::post('register_nhanvien',[manageController::class,'register_nhanvien'])->middleware('checkLogin')->name('register_nhanvien');
    //admin logout
    Route::get('logout', [manageController::class,'adminLogout'])->name('admin_logout');  

    // Thêm loại sản phẩm
    Route::get('manageCategories', [CategoriesController::class,'manageCategories'])->middleware('checkLogin')->name('manageCategories');
    Route::post('addCategories', [CategoriesController::class,'addCategories'])->middleware('checkLogin')->name('addCategories');
    //edit loại sản Phẩm
    Route::get('form-editCategories',[CategoriesController::class,'form_editCategories'])->middleware('checkLogin')->name('form_editCategories');
        //Lấy tất cả loại sản Phẩm
    Route::get('allCategories', [CategoriesController::class,'getAllCategories'])->middleware('checkLogin')->name('allCategories');
    //Lấy tất cả loại sản Phẩm
    Route::get('allCategories', [CategoriesController::class,'getAllCategories'])->middleware('checkLogin')->name('allCategories');
    //Lấy 1 loại sản phẩm
    Route::post('getOneCategories',[CategoriesController::class,'getOneCategori'])->middleware('checkLogin')->name('getOneCategories');
    //Update loại sản phẩm
    Route::post('updateCategories',[CategoriesController::class,'updateCategories'])->middleware('checkLogin')->name('updateCategories');    
    //delete categories
    Route::post('deleteCategories', [CategoriesController::class,'deleteCategories'])->middleware('checkLogin')->name('deleteCategories');
    
    // Thêm nhà cung cấp
    Route::get('form-addSuppliers', [SuppliersController::class,'form_addSuppliers'])->middleware('checkLogin')->name('form_addSuppliers');
    Route::post('form-addSuppliers', [SuppliersController::class,'addSuppliers'])->middleware('checkLogin')->name('addSuppliers');    
    //show manage suppliers page get
    Route::get('manageSuppliers',[SuppliersController::class,'manageSuppliers'])->middleware('checkLogin')->name('getmanageSuppliers');
    //show manage suppliers page get
    Route::post('manageSuppliers',[SuppliersController::class,'manageSuppliers'])->middleware('checkLogin')->name('postmanageSuppliers');
    //get all suppliers get
    Route::get('showSuppliers',[SuppliersController::class,'showSuppliers'])->middleware('checkLogin')->name('showSuppliers');
    //get supplier by it's id
    Route::get('getSupplierById',[SuppliersController::class,'getSupplierById'])->middleware('checkLogin')->name('getSupplierById');
    //update supplier
    Route::post('updateSupplierById',[SuppliersController::class,'updateSupplierById'])->middleware('checkLogin')->name('updateSupplierById');
    //delele supplier
    Route::get('deleteSupplierById',[SuppliersController::class,'deleteSupplierById'])->middleware('checkLogin')->name('deleteSupplierById');
    
    //edit sản Phẩm
    Route::get('form-editProduct',[ProductsController::class,'editProduct'])->middleware('checkLogin')->name('form-editProduct');
    //lất tất cả sản phẩm
    Route::get('getAllProduct', [ProductsController::class,'getAllProduct'])->middleware('checkLogin')->name('getAllProduct');
    //Lấy 1 sản Phẩm
    Route::post('getOneProduct', [ProductsController::class,'getOneProduct'])->middleware('checkLogin')->name('getOneProduct');
    //Update Sản Phẩm
    Route::post('updateProduct', [ProductsController::class,'updateProduct'])->middleware('checkLogin')->name('updateProduct');
    //Delete product
    Route::post('deleteProduct',[ProductsController::class,'deleteProduct'])->middleware('checkLogin')->name('deleteProduct');
    // Thêm sản phẩm
    Route::get('form-addProduct',[ProductsController::class, 'form_addProduct'])->middleware('checkLogin')->name('form_addProduct');
    Route::post('form-addProduct',[ProductsController::class, 'addProduct'])->middleware('checkLogin')->name('addProduct');
    //update content
    Route::POST('updateContent',[ProductsController::class, 'updateContent'])->middleware('checkLogin')->name('updateContent');
    //store product' detail images
    Route::POST('store-product-detail-images',[ProductsController::class, 'addProductDetailImages'])->middleware('checkLogin')->name('productimages');
    //get list img product detail 
    Route::get('ListImgProduct',[ProductsController::class, 'ListImgProduct'])->middleware('checkLogin')->name('ListImgProduct');
    //update hình ảnh chi tiết sản phẩm
    Route::POST('updateProductImagesDetail',[ProductsController::class, 'updateProductImagesDetail'])->middleware('checkLogin')->name('updateProductImagesDetail');
    //Update Quantity Product
    Route::post('UpdateQuantityProduct',[ProductsController::class,'UpdateQuantityProduct'])->middleware('checkLogin')->name('UpdateQuantityProduct');

    //show page offer
    Route::get('showOffer',[OfferController::class,'showOffer'])->middleware('checkNhanVien')->name('showOffer');
    Route::get('dataProductOffer',[OfferController::class,'getDataProduct'])->middleware('checkNhanVien')->name('dataProductOffer');
    //set offer Product
    Route::post('setOffer',[OfferController::class,'setOffer'])->middleware('checkNhanVien')->name('setOffer');

    //xử lý đặt hàng
    Route::get('quan-ly-dat-hang',[ManageOrder::class, 'showListOrder'])->middleware('checkNhanVien')->name('listOrder');
    Route::get('getBillUserOrder',[ManageOrder::class, 'allBillUserOrder'])->middleware('checkNhanVien')->name('getBillUserOrder');
    //get Bill Detail by Id
    Route::get('getBillDetailById',[ManageOrder::class, 'getBillDetailById'])->middleware('checkNhanVien')->name('getBillDetailById');
    //get note by id
    Route::get('getDataNoteById',[ManageOrder::class, 'processBillById'])->middleware('checkNhanVien')->name('getDataNoteById');
    //show page đang giao hàng
    Route::get('dang-giao-hang',[ManageOrder::class, 'showDelivery'])->middleware('checkNhanVien')->name('showDelivery');
    //show page xác nhận giao hàng
    Route::get('xac-nhan-giao-hang',[ManageOrder::class, 'delivery_confirmation'])->middleware('checkNhanVien')->name('delivery_confirmation');
    //send emailid="thongtinkhac"
    Route::get('send_email',[ManageOrder::class, 'send_email'])->middleware('checkNhanVien');
    Route::get('deleteBill',[ManageOrder::class, 'deleteBill'])->middleware('checkNhanVien')->name('deleteBill');

    //Quản lý giảm giá
    Route::get('giam-gia',[SaleController::class,'showPageSale'])->middleware('checkNhanVien')->name('showPageSale');
    Route::get('getDataProductSale',[SaleController::class,'getDataProductSale'])->middleware('checkNhanVien')->name('getDataProductSale');
    Route::post('setProductSale',[SaleController::class,'setProductSale'])->middleware('checkNhanVien')->name('setProductSale');
    //Trang Quản Lý Sản Phẩm Đang Giảm Giá
    Route::get('dang-giam-gia',[SaleController::class,'PageProductOnSale'])->middleware('checkNhanVien')->name('ProductOnSale');
    Route::get('getDataProductOnSale',[SaleController::class,'ProductOnSale'])->middleware('checkNhanVien')->name('getDataProductOnSale');
    Route::post('DeleteProductSale',[SaleController::class,'DeleteProductSale'])->middleware('checkNhanVien')->name('DeleteProductSale');
    
    //thông báo
    Route::get('thong-bao',[Title::class,'showThongBao'])->middleware('checkNhanVien')->name('showThongBao');
});



Route::get('register', [Process_accout::class,'index_register'])->name('register');
Route::post('register', [Process_accout::class,'register'])->name('post_register');
Route::get('logout', [Process_accout::class,'logout'])->name('logout');
//get data district
Route::get('dataDistrict',[Process_accout::class,'districtByIdCity'])->name('dataDistrict');
//get data wards
Route::get('dataWards',[Process_accout::class,'wardsByIdDistrict'])->name('dataWards');

Route::get('add-img-product', function(){
    return view("pages.admin.add_img_product");
});

Route::get('details', function(){
    return view("pages.users.details");
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('',[UserController::class,'index'])->name('index');
    Route::get('dang-nhap',[Process_accout::class,'index_login'])->name('login');
    Route::post('dang-nhap',[Process_accout::class,'login'])->name('post_login');
});

Route::prefix('thong-ke')->group(function () {
    Route::get('san-pham', [ProductController::class,'showChartProduct'])->middleware('checkNhanVien')->name('showChartProduct'); 
    //get data product
    Route::get('getDataProduct', [ProductController::class,'getDataProduct'])->middleware('checkNhanVien')->name('getDataProduct'); 

});
