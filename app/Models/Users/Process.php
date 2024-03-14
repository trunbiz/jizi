<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Process extends Model
{
    use HasFactory;
    // declared table use in database 
    protected $table = 'user';

    // function insert data when user register
    public function register($data)
    {        
        DB::insert('insert into user (u_name, u_email, u_password, u_phone, u_address, u_avatar) 
        values (?, ?, ?, ?, ? ," ")', $data);        
    }

    public function userLogin($email, $pass)
    {
        // dd($email, $pass);
        return DB::table('user')
        ->select('user.*','city.city_name','city.city_code','district.district_name','district.district_code','wards.wards_name','wards.wards_code')
        ->join('city', 'city.city_code', '=', 'user.city_id')  
        ->join('district', 'district.district_code', '=', 'user.district_id')
        ->join('wards', 'wards.wards_code', '=', 'user.wards_id')
        ->where('u_email',$email)
        ->where('u_password',$pass)
        ->get();
    }
}
