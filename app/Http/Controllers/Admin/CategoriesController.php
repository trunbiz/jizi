<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Process;
class CategoriesController extends Controller
{
    private $admin;
    public function __construct()
    {        
        $this->admin = new Process();        
    }
    public function manageCategories()
    {
        return view('pages.admin.categories');
    }

    public function addCategories(Request $request)
    {
        
        $rules = [  
            'image' => 'required',        
            'categories_name' => 'required',
        ];
        $messages = [
            'image.required' => 'Cần phải có ảnh',
            'categories_name.required' => 'Phải đặt tên loại sản phẩm'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $file = $request->image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
           // $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $imageName = time().'.'.$request->image->extension();      // nên làm cách này cho ko trùng tên ảnh      

            $file->move('img\categories', $imageName); //chuyển file đến thư mục mong muốn 
            $path_img = 'img\categories\\'. $imageName; //lấy đường dẫn file đang tồn tại (img\categories\)
            
            $dataInsert = [
                $c_name = $request->categories_name,
                $c_avatar = $path_img,
                $c_active = 1
            ];            
            DB::insert('insert into categories (c_name, c_avatar, c_active) values (?, ?, ?)', $dataInsert);
            return response()->json([
                "success" => 'true'                
            ]); 
        }  
    }
    //show form edit
    public function form_editCategories()
    {
        //lấy dữ liệu từ model qua nè
        $dataCategories = $this->admin->getCategories();    
        return view("pages.admin.editCategories",compact('dataCategories'));
    }
    //get All Categories
    public function getAllCategories()
    {
        //lấy dữ liệu từ model qua nè
        $dataCategories = $this->admin->getCategories();      
        // $json_data['data'] = $dataCategories;  
        // dd($dataCategories);
        $button = [
            'test' => 'button'
        ];
        return response()->json([
            'data' => $dataCategories,
            'button' => $button
        ]);
    }
    //get 1 Categories
    public function getOneCategori(Request $request)
    {
        $categories = DB::table('categories')
        ->where('id',$request->id)
        ->get();
        // dd($categories);
        return response()->json([
            'categories' => $categories
        ]);
    }
    //Update categories
    public function updateCategories(Request $request)
    {
        $rules = [  
            'c_name' => 'required',
            'new_img' => 'file|max:500000|image'  
        ];
        $messages = [
            'c_name.required' => 'Phải đặt tên loại sản phẩm',  
            'new_img.file' => 'Định dạng ảnh không đúng',
            'new_img.size' => 'Tệp tin quá lớn',
            'new_img.image' => 'Định dạng ảnh không đúng' 
        ];

        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){  
            //lấy tên loại
            $name = $request->c_name;
            if($request->hasFile('new_img')){
                $path = 'img\categories\\'; //nơi lưu ảnh

                $imageName = time().'.'.$request->new_img->extension(); //đổi tên ảnh

                $fullPath = $path . $imageName; // lấy full path

                $file = $request->file('new_img')->move( $path , $imageName);
                
                //Update dữ liệu
                
                $update = DB::table('categories')
                ->where('id', $request->id)
                ->update([
                    'c_name' => $name,
                    'c_avatar' => $fullPath
                ]);
                return response()->json([
                   "name" => $name,
                   "url" => $fullPath
                ]);
            }      
            else{
                $update = DB::table('categories')
                ->where('id', $request->id)
                ->update([
                    'c_name' => $name,                    
                ]);
                return response()->json([
                   "name" => $name,                   
                ]);
            }            
        }
        
    }
    //delete categories 
    public function deleteCategories(Request $request)  
    {
        $delete = DB::table('categories')
        ->where('id', $request->id)
        ->update([
            'c_active' => 0,                    
        ]);
        return response()->json([
            'success' => $request->id,
            // 'sl' => $delete
        ]);
    }
}
