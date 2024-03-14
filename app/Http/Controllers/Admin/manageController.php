<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Process;

class manageController extends Controller
{
    private $admin;
    public function __construct()
    {        
        $this->admin = new Process();        
    }
    public function form_login()
    {
        return view('pages.admin.login');
    }
    //đăng nhập quản trị
    public function login_admin(Request $request)
    {   //validation
        $rules = [
            'admin_name' => 'required',
            'admin_password' => 'required',
        ];
        $messages = [
            'admin_name.required' => 'Tên tài khoản không được bỏ trống',
            'admin_password.required' => 'Mật khẩu không được bỏ trống',
        ];

        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $lists = DB::table('admin')
            ->where('a_email', $request->admin_name)
            ->where('a_password', sha1($request->admin_password))
            ->get();
            //Để dữ liệu vào session
            if(count($lists) != 0){
                $dataAdmin = [
                    'id_admin'=> $lists[0]->id,
                    'admin_name' => $lists[0]->a_name,
                    'permission' => $lists[0]->permission_id
                ];
                session($dataAdmin);
                return response()->json([
                    'success' => true,
                    'permission' => $lists[0]->permission_id
                ]);
            }else{
                return response()->json([
                    'fail' => false,
                ]);
            }

            // return redirect()->route('form_addProduct');
        }
        
    }
    //Xóa đăng nhập admin
    public function adminLogout()
    {
        session()->pull('id_admin');        
        return redirect()->route('adminLogin');
    }
    public function form_register()
    {
        return view('pages.admin.register');
    }
    //đăng ký quyền quản trị
    public function register_admin(Request $request)
    {
        $rules = [  
            'admin_name' => 'required',        
            'admin_mail' => 'required|unique:admin,a_email',
            'admin_phone' => 'required',
            'admin_password' => 'required|min:8',
            'admin_password_repeat' => 'required|same:admin_password|min:8',
        ];
        $messages = [
            'admin_name.required' => 'Phải có tên người quản trị',
            'admin_mail.required' => 'Gmail chưa nhập',
            'admin_phone.required' => 'Số điện thoại không được trống',
            'admin_password.required' => 'Mật khẩu không được trống',
            'admin_password_repeat.required' => 'Mật khẩu không được trống',            
            'admin_mail.unique' => 'Email đã được sử dụng',
            'admin_password_repeat.same' => 'Mật khẩu không đúng',
            'admin_password.min' => 'Mật Khẩu phải từ :min ký tự trở lên',
            'admin_password_repeat.min' => 'Mật Khẩu phải từ :min ký tự trở lên'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $dataInsert = [
                'a_name' => $request->admin_name,
                'a_email' => $request->admin_mail,
                'a_phone' => $request->admin_phone,
                'a_password'	=> sha1($request->admin_password),
                'a_active' => 1,
                'permission_id' => 2,
            ];
            DB::table('admin')
            ->insert($dataInsert);
            $lastInsertId = DB::getPdo()->lastInsertId();
            $dataAdmin = [
                'id_admin'=> $lastInsertId,
                'admin_name' => $request->admin_name,
            ];
            session($dataAdmin);
            return redirect()->route('form-editProduct');  
        }
    }
    //show form đăng ký nhân viên
    public function form_register_nv()
    {
        return view('pages.admin.reg_nhanvien');
    }
    //dang ky nhân viên
    public function register_nhanvien(Request $request)
    {
        $rules = [  
            'admin_name' => 'required',        
            'admin_mail' => 'required|unique:admin,a_email',
            'admin_phone' => 'required',
            'admin_password' => 'required|min:8',
            'admin_password_repeat' => 'required|same:admin_password|min:8',
        ];
        $messages = [
            'admin_name.required' => 'Phải có tên người quản trị',
            'admin_mail.required' => 'Gmail chưa nhập',
            'admin_phone.required' => 'Số điện thoại không được trống',
            'admin_password.required' => 'Mật khẩu không được trống',
            'admin_password_repeat.required' => 'Mật khẩu không được trống',            
            'admin_mail.unique' => 'Email đã được sử dụng',
            'admin_password_repeat.same' => 'Mật khẩu không đúng',
            'admin_password.min' => 'Mật Khẩu phải từ :min ký tự trở lên',
            'admin_password_repeat.min' => 'Mật Khẩu phải từ :min ký tự trở lên'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $dataInsert = [
                'a_name' => $request->admin_name,
                'a_email' => $request->admin_mail,
                'a_phone' => $request->admin_phone,
                'a_password'	=> sha1($request->admin_password),
                'a_active' => 1,
                'permission_id' => 3,
            ];
            DB::table('admin')
            ->insert($dataInsert);
            $lastInsertId = DB::getPdo()->lastInsertId();
            $dataAdmin = [
                'id_admin'=> $lastInsertId,
                'admin_name' => $request->admin_name,
            ];
            session($dataAdmin);
            return redirect()->route('adminLogin');  
        }
    }
    

    
            
    
    
    
    
    
    // //show form edit
    // public function form_editCategories()
    // {
    //     //lấy dữ liệu từ model qua nè
    //     $dataCategories = $this->admin->getCategories();    
    //     return view("pages.admin.editCategories",compact('dataCategories'));
    // }
    // //get All Categories
    // public function getAllCategories()
    // {
    //     //lấy dữ liệu từ model qua nè
    //     $dataCategories = $this->admin->getCategories();      
    //     // $json_data['data'] = $dataCategories;  
    //     // dd($dataCategories);
    //     $button = [
    //         'test' => 'button'
    //     ];
    //     return response()->json([
    //         'data' => $dataCategories,
    //         'button' => $button
    //     ]);
    // }
    // //get 1 Categories
    // public function getOneCategori(Request $request)
    // {
    //     $categories = DB::table('categories')
    //     ->where('id',$request->id)
    //     ->get();
    //     // dd($categories);
    //     return response()->json([
    //         'categories' => $categories
    //     ]);
    // }
    
    
    
    
    
    
    
    
    
    
    

    

    

    

}
