<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Title extends Controller
{
    public function showThongBao()
    {
        $soluongdat = DB::table('bill_detail')
        ->join('bill','bill.b_id','=','bill_detail.bd_bill_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->select('bd_product_id','description_detail_id','product.pro_name',DB::raw('sum(bd_amount) as soluongdat'))
        ->where('bill.b_status',1)
        ->groupBy('bd_product_id','description_detail_id')
        ->get();
        //check tồn kho
        $checkTonKho = 0;
        $thongbao = "";
        foreach($soluongdat as $item){
            $dataProduct = DB::table("description_detail")
            ->where("product_id",$item->bd_product_id)
            ->where("id",$item->description_detail_id)
            ->first();
            if($item->soluongdat > $dataProduct->quantity){
                $thongbao .= "<div style='color:red;'><b>Sản phẩm ". $item->pro_name ." đang được đặt ".$item->soluongdat  ." trong khi trong kho chỉ còn ". $dataProduct->quantity ."</b> </div>";
                $checkTonKho++;
            }                
        }
        // dd($soluongdat,$checkTonKho);
        return view('pages.admin.thongbao',compact('thongbao'));
    }
}
