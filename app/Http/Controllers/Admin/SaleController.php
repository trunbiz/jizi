<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
class SaleController extends Controller
{
    //show page sale product
    public function showPageSale()
    {
        // $dataProduct = DB::table('product')
        // ->join('categories','categories.id','=','product.pro_category_id')
        // ->get();
        return view('pages.admin.sale');
    }
    //show page on sale 
    public function PageProductOnSale()
    {
        return view('pages.admin.on_sale');
    }    
    //get Data Product
    public function getDataProductSale()
    {
        $dataTable = DB::table('product')
        ->join('categories','product.pro_category_id','=','categories.id')
        ->join('suppliers','product.supplier_id','=','suppliers.id')
        ->join('description_detail','description_detail.product_id','=','product.id')
        ->select('product.*','categories.c_name','suppliers.s_name','description_detail.price','description_detail.type','description_detail.id as des_id')
        ->where('pro_status',1)
        ->where('description_detail.status',1)
        ->whereNotExists(function($query){ 
            $date = Carbon::now();
            $today = $date->toDateString(); 
            $query->from('sale')
            ->select('*')
            ->where('sale.product_id','=',DB::raw('product.id'))
            ->where('sale.start_sale','<=',$today)
            ->where('sale.end_sale','>=',$today)
            ->where('sale.status',1);           
        })
        ->orderBy('id','desc')
        ->get();
        // dd($dataTable);
        return response()->json([
            'data' => $dataTable
        ]);
    }
    public function ProductOnSale(Request $request)
    {
        $date = Carbon::now();
        $today = $date->toDateString(); 

        $dataTable = DB::table('sale')
        ->join('product', 'product.id','sale.product_id')
        ->join('description_detail','description_detail.product_id','product.id')
        ->select('product.*','description_detail.price','sale.start_sale','sale.end_sale','sale.discount')
        ->where('start_sale','<=',$today)
        ->where('end_sale','>=',$today)
        ->where('sale.status',1)
        ->get();
        return response()->json([
            'data' => $dataTable
        ]);
    }
    public function setProductSale(Request $request)
    {
        $rules = [  
            'star_sale' => 'required',        
            'end_sale' => 'required',
            'sale' => 'required',
        ];
        $messages = [
            'star_sale.required' => 'Cần có ngày bắt đầu',
            'end_sale.required' => 'Cần có ngày kết thúc',
            'sale.required' => 'Cần có tỷ lệ giảm giá'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 

        DB::table('sale')
        ->insert([
            'product_id' => $request->id,
            'discount' => $request->sale,
            'status' => 1,
            'start_sale' => $request->star_sale,
            'end_sale' => $request->end_sale,
        ]);
        return response()->json([
            'star_sale'=> $request->star_sale,
            'end_sale'=> $request->end_sale
        ]);
    }
    public function DeleteProductSale(Request $request)
    {
        DB::table('sale')
        ->where('product_id','=',$request->id)
        ->update([
            'status' => 0
        ]);
        return response()->json([
            'Hi' => $request->id
        ]);
    }
}
