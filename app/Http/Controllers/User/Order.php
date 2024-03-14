<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
// use Illuminate\Http\Response;
class Order extends Controller
{
    private $table = 'product';
    //user order
    public function userOrder(Request $request)
    {   
        $user_ip = $request->ip();
        dd($user_ip);
        return true;  
    }

    //get a product by id
    public function getProductById (Request $request)
    {
        $date = Carbon::now();
        $today = $date->toDateString();
        $sale = DB::table('sale')
        ->where('sale.product_id',$request->id)
        ->where('sale.start_sale','<=',$today)
        ->where('sale.end_sale','>=',$today)
        ->where('sale.status',1)
        ->get();
        if(count($sale) == 0){
            $dataProduct = DB::table($this->table)
            ->join('description_detail','product.id','=','description_detail.product_id')
            ->select('product.*','description_detail.*','description_detail.id as idDes')
            ->where('description_detail.status','1')
            ->where('product.id', '=', $request->id)
            ->get();
            $img = '';
            $arr = explode(" ", trim($dataProduct[0]->pro_detail_images));
            for ($i=0; $i < count($arr); $i++) { 
                $img .= "<li role='presentation' class='active single-img-detail'><a href='#img-one' role='tab' data-toggle='tab'>
                <img src='".asset($arr[$i])."' alt='tab-img' style='width: 100px; height:100px'></a></li>";
            }
            return response()->json([
                'product' => $dataProduct,
                'arr' => $img,
                'sale' => count($sale)
            ]);
        }else{
            $dataProduct = DB::table($this->table)
            ->join('description_detail','product.id','=','description_detail.product_id')
            ->join('sale','sale.product_id','=','product.id')
            ->select('product.*','description_detail.*','description_detail.id as idDes','sale.discount')
            ->where('description_detail.status','1')
            ->where('product.id', '=', $request->id)
            ->where('sale.status',1)
            ->get();
            $img = '';
            $arr = explode(" ", trim($dataProduct[0]->pro_detail_images));
            for ($i=0; $i < count($arr); $i++) { 
                $img .= "<li role='presentation' class='active single-img-detail'><a href='#img-one' role='tab' 
                data-toggle='tab'><img src='".asset($arr[$i])."' alt='tab-img' style='width: 100px; height:100px'></a></li>";
            }
            return response()->json([
                'product' => $dataProduct,
                'arr' => $img,
                'sale' => $sale,
                'count' => count($sale)
            ]);
        }
        
    }

    public function showProductDetailById($id)
    {        
        $date = Carbon::now();
        $today = $date->toDateString();
        $sale = DB::table('sale')
        ->where('sale.product_id',$id)
        ->where('sale.start_sale','<=',$today)
        ->where('sale.end_sale','>=',$today)
        ->where('sale.status',1)
        ->get();
        $hasSale = count($sale);
        $data_query = DB::table($this->table)
        ->where('product.id','=',$id)
        ->leftjoin('description_detail','product.id','=', 'description_detail.product_id')
        ->first();
        $arr = explode(" ",trim($data_query->pro_detail_images));
        array_unshift($arr,$data_query->pro_avatar);
        $details = DB::table('description_detail')
        ->select('price','type','id')
        ->where('product_id',$id)
        ->get();
        $randomquery = DB::table('product')
        ->where('pro_category_id' , $data_query->pro_category_id)
        ->leftjoin('description_detail','product.id','=', 'description_detail.product_id')
        ->inRandomOrder()
        ->limit(6)
        ->get();
        return view("pages.users.details",compact('data_query','details','arr','sale','hasSale','randomquery'));
    }
    //Get a description by id
    public function getDesById(Request $request)
    {  
        $date = Carbon::now();
        $today = $date->toDateString();
        $dataDes = DB::table('description_detail')
        ->where('id','=',$request->id)
        ->first();
        $product_sale = DB::table('sale')
        ->where('sale.product_id',$dataDes->product_id)
        ->where('sale.start_sale','<=',$today)
        ->where('sale.end_sale','>=',$today)
        ->where('sale.status',1)
        ->get();
        return response()->json([
            'product' => $dataDes,
            'count' => count($product_sale),
            'sale' => $product_sale,
        ]);
    }
    // user order product login
    public function orderProduct(Request $request)
    {
        $date = Carbon::now();
        $today = $date->toDateString();
        $rules = [
            'amount' =>'required',
            'amount' => 'between:1,100'
        ];
        $mess = [
            'amount.required' => 'Phải có dữ liệu',
            'amount.between' => 'Dữ liệu sai'
        ];
        
        $check = Validator::make($request->all(),$rules,$mess);
        $check->validate(); 
        if(!$check->fails()){
            $idProduct = $request->id;
            $minutes = 1440; //1 day
            $check = false;
            $price = $request->price;
            $amount = $request->amount;
            $description_detail_id = $request->description_detail_id;
            // Cookie::get('idCookie')!== null
            if($request->session()->has('id_user')){
                $check = true;
                $user_id = $request->session()->get('id_user');
                //get data user
                $dataUser = DB::table('user')
                ->where('id',$user_id)
                ->first();
                //get All Bill User
                $getAllBillUser = DB::table('bill')
                ->where('b_user_id','=',$user_id)
                ->where('b_status',0)
                ->get();
                //Last Insert Id 
                $lastInsertId = "";
                //No bill 
                if($getAllBillUser->count() == 0){
                    DB::table('bill')
                    ->insert([
                        'b_user_id'     => $dataUser->id,
                        'b_total'       => 0,
                        'b_phone'       => $dataUser->u_phone,
                        'city'          => 1,
                        'district'      => 1,
                        'ward'          => 1,
                        'b_status'      => 0, //Đang Đặt = 0, Đang đợi xác nhận đơn hàng = 1, Hoàn thành = 2
                        'b_note'        => 0, 
                        'cookie'        => 1
                    ]);
                    $lastInsertId = DB::getPdo()->lastInsertId();
                    $sale = DB::table('sale')
                    ->where('sale.product_id', $idProduct)
                    ->where('sale.start_sale','<=',$today)
                    ->where('sale.end_sale','>=',$today)
                    ->where('sale.status',1)
                    ->get();
                    if(count($sale)==0){
                        DB::table('bill_detail')
                        ->insert([
                            'bd_bill_id' => $lastInsertId,
                            'bd_product_id' => $idProduct,
                            'description_detail_id' => $description_detail_id,
                            'bd_price' => $price,
                            'bd_amount' => $amount,
                            'bd_total_amount' => $price * $amount
                        ]);
                    }else{
                        $discount = $sale[0]->discount;
                        $price_sale = ($price*(100-$discount))/100;
                        DB::table('bill_detail')
                        ->insert([
                            'bd_bill_id' => $lastInsertId,
                            'bd_product_id' => $idProduct,
                            'description_detail_id' => $description_detail_id,
                            'bd_price' => $price_sale,
                            'bd_amount' => $amount,
                            'bd_total_amount' => $price_sale * $amount
                        ]);
                    }                    
                    $num = $this->getQuantityOrder($lastInsertId);                    
                }else{ //Has Bill
                    $sale = DB::table('sale')
                    ->where('sale.product_id', $idProduct)
                    ->where('sale.start_sale','<=',$today)
                    ->where('sale.end_sale','>=',$today)
                    ->where('sale.status',1)
                    ->get();
                    
                    if(count($sale)==0){
                        DB::table('bill_detail')
                        ->insert([
                            'bd_bill_id' => $getAllBillUser[0]->b_id,
                            'bd_product_id' => $idProduct,
                            'description_detail_id' => $description_detail_id,
                            'bd_price' => $price,
                            'bd_amount' => $amount,
                            'bd_total_amount' => $price * $amount
                        ]);
                    }else{
                        $discount = $sale[0]->discount;
                        $price_sale = ($price*(100-$discount))/100;
                        
                        DB::table('bill_detail')
                        ->insert([
                            'bd_bill_id' => $getAllBillUser[0]->b_id,
                            'bd_product_id' => $idProduct,
                            'description_detail_id' => $description_detail_id,
                            'bd_price' => $price_sale,
                            'bd_amount' => $amount,
                            'bd_total_amount' => $price_sale * $amount
                        ]);                        
                    }                    
                    $num = $this->getQuantityOrder($getAllBillUser[0]->b_id);
                }
                $dataBill = $this->getDataUserOrder($user_id); 
                $dataTranfer = $this->transferDataOrder($dataBill,$num);               
            }else{
                $check = false;
            }
            return response()->json([
                'idProduct' => $request->id,
                'num' => $num,
                'sale' =>$sale,
                // 'taooday' => $taooday
            ]);
        }
    }
    //user order product no login
    public function OrderProductHasLogin()
    {
        return response()->json([
            'a' => 'Hi'
        ]);
    }
    //get quantity order
    public function getQuantityOrder($id_bill)
    {
        return DB::table('bill_detail')
        ->where('bd_bill_id', $id_bill)
        ->count();
    }
    //order data transfer
    public function transferDataOrder($dataBill,$numberOrder)
    {
        $mp = '';
        if(isset($numberOrder) && $numberOrder != 0){
            if($numberOrder < 3){
                $mp .= '<div class="header-chart-dropdown" >';
            }else{
                $mp .= '<div class="header-chart-dropdown list-data" >';
            }
            foreach($dataBill as $item){
                $mp .= '<div class="header-chart-dropdown-list ">
                            <div class="dropdown-chart-left floatleft">
                                <a href="#"><img src="'.asset("$item->pro_avatar").'" alt="list" style="width:80px;height: 80px;"></a>
                            </div>
                            <div class="dropdown-chart-right">
                                <h2><a href="#">'.$item->pro_name .'</a></h2>
                                <h3>Số Lượng: '.$item->bd_amount .'</h3>
                                <h4>'. number_format($item->bd_total_amount, 0, ",", ".") . " vnđ" .'</h4>
                            </div>
                        </div>';
            }
            $mp .= '<div class="chart-checkout">
                        <p>TỔNG CỘNG<span>'. number_format($item->b_total, 0, ',', '.') . " vnđ". '</span></p>
                        <button type="button" class="btn btn-default">THANH TOÁN</button>
                    </div>';
            $mp .= '</div>';
        }else{
            $mp .= '<div class="header-chart-dropdown" style="text-align: center; color:blue">
                        No Data
                    </div>';
        }
        return $mp;
    }
    //get data bill user order
    public function getDataUserOrder($idUser)
    {
        $user_id = $idUser;
        $dataBill = DB::table('bill_detail')
        ->select('bill_detail.*','product.pro_name', 'description_detail.type','product.pro_avatar','bill.b_total')
        ->join('description_detail','description_detail.id','=','bill_detail.description_detail_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->join('bill','bill.b_id','=','bill_detail.bd_bill_id')
        ->where('b_user_id',$user_id)
        ->where('b_status',0) //lấy ra bill đang đặt
        ->get();
        return $dataBill;
    }
    //get price by id
    public function getPriceById(Request $request)
    {
        $details = DB::table('description_detail')
        ->where('id',$request->id)
        ->first();

        $sale = DB::table('sale')
        ->where('product_id',$details->product_id)
        ->get();
        if(count($sale) != 0){
            return response()->json([
                'data' => $details,
                'count' => count($sale),
                'sale' => $sale
            ]);
        }else{
            return response()->json([
                'data' => $details,
                'count' => count($sale)
            ]);
        }
        
    }
}
