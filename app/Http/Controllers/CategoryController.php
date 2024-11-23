<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if (!$admin_id) {
            return redirect()->route('admin.login')->send();
        }
    }


    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        return view('pages.admin.category.all_category_product')
            ->with('all_category_product', $all_category_product);
    }


    public function add_category_product()
    {
        $this->AuthLogin();
        return view('pages.admin.category.add_category_product');
    }

    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return redirect()->route('category.product.all');
    }
    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->update(['category_status' => 0]);
        Session::put('message', 'Ẩn danh mục sản phẩm thành công');
        return redirect()->route('category.product.all');
    }

    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();
        $updateStatus = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->update(['category_status' => 1]);
        if ($updateStatus) {
            Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        } else {
            Session::put('message', 'Có lỗi xảy ra, không thể kích hoạt danh mục sản phẩm');
        }
        return redirect()->route('category.product.all');
    }

}
