<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class ManageOrder extends Controller
{
    //show page manage order
    public function showListOrder(Request $request)
    {
        $code = 1;
        return view('pages.admin.list_order',compact('code'));
    }
    //bill đang chờ duyệt
    public function allBillUserOrder(Request $request)
    {
        $dataBill = DB::table('bill')
        ->join('user','user.id','=','bill.b_user_id')
        ->join('city','city.city_code','=','bill.city')
        ->join('district','district.district_code','=','bill.district')
        ->join('wards','wards.wards_code','=','bill.ward')
        ->select('bill.*','user.u_name', 
        DB::raw("CONCAT(city.city_name,', ', district.district_name,', ', wards.wards_name) as address"),
        )
        ->where('bill.b_status',$request->code)
        ->orderBy('bill.b_id','DESC')
        ->get();        
        return response()->json([
            'data' =>  $dataBill,
        ]);

    }
    
    public function getBillDetailById(Request $request)
    {
        $Bill_id = $request->id;
        $dataBillDetail = DB::table('bill')
        ->join('bill_detail','bill_detail.bd_bill_id','=','bill.b_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->join('description_detail','description_detail.id','=','bill_detail.description_detail_id')
        ->where('bill_detail.bd_bill_id',$Bill_id)
        ->get();

        $modal = '';
        foreach($dataBillDetail as $item){
            $modal .= '<div class="single-review">
                            <div class="single-review-img">
                                <a href="#"><img src="'.asset('').$item->pro_avatar.'" alt="review" style="width:90px;height: 90px;" class="img_product" ></a>
                            </div>
                            <div class="single-review-content fix">
                                <h2 class="product_name" ><a href="#"> Tên Sản Phẩm: '.$item->pro_name .'</a></h2>
                                <p class="product_des" > Giá: '. number_format($item->bd_price, 0, ',', '.'). " vnđ"  .'<span></span></p>
                                <p class="product_amount"> Loại: '. $item->type . '<span></span> </p>
                                <p>Số Lượng: '. $item->bd_amount .'</p>
                                <h3 style="color: red"><b>Tổng: '.number_format($item->bd_total_amount, 0, ',', '.'). " vnđ"  .' </b></h3>
                            </div>
                        </div>';
        }

        return response()->json([
            'pd' => $modal
        ]);
    }

    public function processBillById(Request $request)
    {
        $action = $request->action;
        $code = $request->code;
        if($action == "getNote"){
            $dataNote = DB::table('bill')
            ->select('b_note')
            ->where('b_id', $request->id)
            ->first();
            $html ="<p class='note-body'>".$dataNote->b_note."</p>";
            return response()->json([   
                'note' => $html,
            ]);
        }if($action == "updateStatus"){
            //số lượng người dùng đặt
            $dataBillPlace = DB::table("bill_detail")
            ->select('bill_detail.bd_product_id','description_detail_id',DB::raw('sum(bill_detail.bd_amount) as soluong'))
            ->where("bill_detail.bd_bill_id", "=", $request->id)
            ->groupBy("bd_product_id","description_detail_id")
            ->get();
            //kiểm tra trong số lượng tồn kho
            $checkTonKho = 0;
            foreach($dataBillPlace as $item){
                $dataProduct = DB::table("description_detail")
                ->where("product_id",$item->bd_product_id)
                ->where("id",$item->description_detail_id)
                ->first();
                if($item->soluong > $dataProduct->quantity)
                    $checkTonKho++;
            }
            if($checkTonKho == 0){
                // lấy dữ liệu đặt hàng
                $select = DB::table('bill')
                ->join('user','user.id', '=','bill.b_user_id')
                ->where('b_id', $request->id)
                ->first();
                $name = $select->u_name;
                $gmail = $select->u_email;
                $total = $select->b_total;
                if($select->b_status == 1){
                    //dữ liệu gửi mail
                    $dataBill = DB::table('bill_detail')
                    ->join('product','product.id','=','bill_detail.bd_product_id')
                    ->select('product.pro_name','bd_price','bd_amount','bd_total_amount','bd_product_id')
                    ->where('bd_bill_id', $request->id)                      
                    ->get();
                    //dữ liệu để trừ
                    $dataInBill = DB::table('bill_detail')
                    ->join('product','product.id','=','bill_detail.bd_product_id')
                    ->select('product.pro_name','bd_price','bd_amount','bd_total_amount','description_detail_id','bd_product_id')
                    ->where('bd_bill_id', $request->id)                      
                    ->get();
                    //trừ số lượng
                    // $text = "";
                    foreach($dataInBill as $item){
                        //lấy số lượng
                        $soluong = DB::table('description_detail')
                        ->where('product_id',$item->bd_product_id)
                        ->where('id',$item->description_detail_id)
                        ->first();
                        // $text .= "Sản Phẩm: ".$item->bd_product_id ." Loại: ".$item->id;
                        DB::table('description_detail')
                        ->where('product_id',$item->bd_product_id)
                        ->where('id',$item->description_detail_id)
                        ->update([
                            'quantity' => $soluong->quantity - $item->bd_amount
                        ]);
                    }
                    // return response()->json([
                    //     'soluong' => $text,
                    //     "dataBill" =>$dataBill
                    // ]);
                    $title = "VẬN CHUYỂN:";
                    $content = "Đơn hàng của bạn đang được chuyển đến, xin vui lòng chờ đợi 30-60 phút. Shipper sẽ gửi đến ngay!!";
                    Mail::send('partial.admin.email',compact('name','dataBill','total','title','content'),function($email) use($name,$gmail){
                        $email->subject('Cảm Ơn Bạn Đã Đặt Hàng');
                        $email->to($gmail);
                    });
                }else if($select->b_status == 2){
                    $dataBill = DB::table('bill_detail')
                    ->join('product','product.id','=','bill_detail.bd_product_id')
                    ->join('description_detail','description_detail.product_id','=','product.id')
                    ->select('product.pro_name','type','bd_price','bd_amount','bd_total_amount')
                    ->where('bd_bill_id', $request->id)
                    ->get();
                    $title = "THANH TOÁN THÀNH CÔNG:";
                    $content = "Đơn hàng của bạn đã được thanh toán thành công! Cảm ơn Quý Khách";
                    Mail::send('partial.admin.email',compact('name','dataBill','total','title','content'),function($email) use($name,$gmail){
                        $email->subject('Cảm Ơn Bạn Đã Đặt Hàng');
                        $email->to($gmail);
                    });
                }
                
                DB::table('bill')
                ->where('b_id', $request->id)
                ->update([
                    'b_status' => $code + 1
                ]);
                return response()->json([
                    'updateStatus' => 'updateStatus',
                    'success' => true
                ]);
            }else{
                return response()->json([
                    'updateStatus' => 'updateStatus',
                    'success' => false,
                ]);
            }

            
        }
        
    }
    //show delivery
    public function showDelivery()
    {
        $code = 2;
        return view('pages.admin.list_order',compact('code'));
    }

    //show xác nhận giao Hàng
    public function delivery_confirmation()
    {
        $code = 3;
        return view('pages.admin.list_order',compact('code'));
    }
    //send email
    public function send_email(){
        $name = "Phú";
        Mail::send('partial.admin.email',compact('name'),function($email){
            $email->subject('Cảm Ơn Bạn Đã Đặt Hàng');
            $email->to('hoangphu329@gmail.com','Đồ Đồng Nát');
        });
    }

    //xoa bill
    public function deleteBill(Request $request)
    {
        DB::table('bill')
        ->where('b_id', $request->id)
        ->update([
            'b_status' => 99
        ]);
        return response()->json([
            'test' =>'Hi'
        ]);
    }
}
