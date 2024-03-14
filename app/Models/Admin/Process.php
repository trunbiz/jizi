<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Process extends Model
{
    use HasFactory;
    private $categories = 'categories';
    private $suppliers = 'suppliers';
    //lấy loại sản phẩm
    public function getCategories()
    {
        $lists = DB::table($this->categories)
        ->where('c_active',1)
        ->orderBy('id', 'DESC')
        ->get();
        // dd($lists);
        return $lists;
    }
    //lấy nhà cung cấp
    public function getSuppliers()
    {
        $lists = DB::table($this->suppliers)->get();
        // dd($lists);
        return $lists;
    }
}
