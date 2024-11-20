<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $cate_product = DB::table('tbl_category_product')
            ->where('category_status', '1')
            ->orderby('category_id', 'desc')
            ->get();

        $brand_product = DB::table('tbl_brand')
            ->where('brand_status', '1')
            ->orderby('brand_id', 'desc')
            ->get();


        return view("pages.client.home")
            ->with('category', $cate_product)
            ->with('brand', $brand_product);
    }

}
