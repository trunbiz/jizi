<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Process;
class SuppliersController extends Controller
{
    private $admin;
    public function __construct()
    {        
        $this->admin = new Process();        
    }
    public function form_addSuppliers()
    {
        return view('pages.admin.add_suppliers');
    }

    public function addSuppliers(Request $request){
       
        $request->validate([
            'suppliers_name' => 'required',
            'suppliers_mail' =>'required',
            'suppliers_phonenumber' => 'required|digits:10|numeric',
            'suppliers_avt' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ],
        [
            'suppliers_name.required' => 'Tên nhà cung cấp không được bỏ trống',
            'suppliers_mail.required' => 'Email nhà cung cấp không được bỏ trống',
            'suppliers_phonenumber.required' => 'Số điện thoại nhà cung cấp không được bỏ trống',
            'suppliers_phonenumber.digits' => 'Số điện thoại không hợp lệ',
            'suppliers_phonenumber.numeric' => 'Số điện thoại không hợp lệ',
            'suppliers_avt.image' => 'Avatar không đúng định dạng !!!',
            'suppliers_avt.mimes' => 'Avatar không đúng định dạng !!!',
        ]);  
             
        if ($request->hasFile('suppliers_avt')) {
            $file = $request->suppliers_avt; //Lấy file từ form sang -- image là dữ liệu nhập vào  
           // $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $imageName = time().'.'.$request->suppliers_avt->extension();      // nên làm cách này cho ko trùng tên ảnh      
            $file->move('img\suppliers', $imageName); 
            $path_img = 'img\suppliers\\'. $imageName;
            
            $dataInsert = [
                $s_name = $request->suppliers_name,
                $s_mail = $request->suppliers_mail,
                $s_phonenumber = $request->suppliers_phonenumber,
                $s_image = $path_img,
            ];

            DB::insert('insert into suppliers (s_name, s_email, s_phone, s_avt) values (?, ?, ?, ?)', $dataInsert);        
         // DB::insert('insert into categories (c_name, c_avatar, c_active) values (?, ?, ?)', $dataInsert);
            return response()->json([
                "mess" => "true",
                "s_name" => $request->suppliers_name
            ]);
        }
        else{
            $dataInsert = [
                $s_name = $request->suppliers_name,
                $s_mail = $request->suppliers_mail,
                $s_phonenumber = $request->suppliers_phonenumber,               
            ];

            DB::insert('insert into suppliers (s_name, s_email, s_phone) values (?, ?, ?)', $dataInsert);  
            return response()->json([
                "mess" => "true"
            ]);
        }
        return response()->json([
            "mess" => "false"
        ]);
    }
    //manage suppliers page
    public function manageSuppliers(){
        return view('pages.admin.manageSupplier');
    }
    public function showSuppliers(){
        $data = DB::table('suppliers')
        ->where('s_status',1)
        ->orderBy('id','desc')
        ->get();
        return response()->json([
            'data' => $data 
        ]);       
    }
    
    public function showEditSupplier($id){
        $data = DB::table('suppliers')
        ->where('id', $id)
        ->first();
        return response() ->json([
            'data' => $data        
        ]);
    }
    //get a supplier by it's id
    public function getSupplierById(Request $request)
    {
        $data = DB::table('suppliers')
        ->where('id',$request->id)
        ->get();
        return response()->json([
            'supplier' => $data
        ]);       
    }

    

    public function deleteSupplierById(Request $request)
    {
        $delete = DB::table('suppliers')
        ->where('id', $request->id)
        ->update([
            's_status' => 0,                    
        ]);
        return response()->json([
            'success' => $request->id,
        ]);     
    }
    public function updateSupplierById(Request $request)
    {
        $rules = [  
            'suppliers_name' => 'required',
            'suppliers_mail' =>'required',
            'suppliers_phonenumber' => 'required|digits:10|numeric',
            'suppliers_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
        $messages = [
            'suppliers_name.required' => 'Tên nhà cung cấp không được bỏ trống',
            'suppliers_mail.required' => 'Email nhà cung cấp không được bỏ trống',
            'suppliers_phonenumber.required' => 'Số điện thoại nhà cung cấp không được bỏ trống',
            'suppliers_phonenumber.digits' => 'Số điện thoại không hợp lệ',
            'suppliers_phonenumber.numeric' => 'Số điện thoại không hợp lệ',
            'suppliers_image.image' => 'Avatar không đúng định dạng !!!',
            'suppliers_image.mimes' => 'Avatar không đúng định dạng !!!',
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 

        if(!$check->fails()){
            if($request->hasFile('suppliers_image')){
                $file = $request->suppliers_image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
                $imageName = time().'.'.$request->suppliers_image->extension();      // nên làm cách này cho ko trùng tên ảnh      
                $file->move('img\suppliers', $imageName); //chuyển file đến thư mục mong muốn 
                $path_img = 'img\suppliers\\'. $imageName; //lấy đường dẫn file đang tồn tại (img\categories\)
                $update = DB::table('suppliers')
                ->where('id', $request->id)
                ->update([
                    's_name' => $request->suppliers_name,
                    's_email' => $request->suppliers_mail,                
                    's_avt' => $path_img,
                    's_phone'=>$request->suppliers_phonenumber                                 
                ]);
            }else{                
                $update = DB::table('suppliers')
                ->where('id', $request->id)
                ->update([
                    's_name' => $request->suppliers_name,
                    's_email' => $request->suppliers_mail,                
                    's_phone'=>$request->suppliers_phonenumber                                 
                ]);
            }            
            return response()->json([
                "success" => $update,                
            ]); 
        }
    }

}
