<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OfferController extends Controller
{
    //show page offer product
    public function showOffer()
    {
        $dataProduct = DB::table('product')
        ->join('categories','categories.id','=','product.pro_category_id')
        ->get();
        return view('pages.admin.offer');
    }
    //get Data Product
    public function getDataProduct()
    {
        $dataTable = DB::table('product')
        ->join('categories','product.pro_category_id','=','categories.id')
        ->join('suppliers','product.supplier_id','=','suppliers.id')
        ->join('description_detail','description_detail.product_id','=','product.id')
        ->select('product.*','categories.c_name','suppliers.s_name','description_detail.price','description_detail.type','description_detail.id as des_id')
        ->where('pro_status',1)
        ->where('description_detail.status',1)
        ->orderBy('id','desc')
        ->get();
        // dd($dataTable);
        return response()->json([
            'data' => $dataTable
        ]);
    }

    //set product offer
    public function setOffer(Request $request)
    {
        $idProduct = $request->id;
        $query = DB::table('offer')
        ->where('product_id',$idProduct)
        ->get();
        if(count($query) == 0){
            $insert = DB::table('offer')
            ->insert([
                'product_id' => $idProduct,
                'day_offer'=> date('Y-m-d')
            ]);
        }else{
            DB::table('offer')
            ->where('product_id',$idProduct)   
            ->update([
                'day_offer'=> date('Y-m-d')
            ]) ;
        }
        return response()->json([
            'data' => count($query)
        ]);
    }
}
