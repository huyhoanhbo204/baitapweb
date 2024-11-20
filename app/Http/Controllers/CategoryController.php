<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    // Kiểm tra đăng nhập
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if (!$admin_id) {
            return Redirect::to('admin')->send();
        }
    }

    // Hiển thị tất cả danh mục sản phẩm
    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        return view('pages.admin.category.all_category_product')
            ->with('all_category_product', $all_category_product);
    }

    // Trang thêm danh mục sản phẩm
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('pages.admin.category.add_category_product');
    }

    // Lưu danh mục sản phẩm
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

    // Ẩn danh mục sản phẩm
    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->update(['category_status' => 0]);
        Session::put('message', 'Ẩn danh mục sản phẩm thành công');
        return redirect()->route('category.product.all');
    }
    // Kích hoạt danh mục sản phẩm
    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();

        // Cập nhật trạng thái của danh mục sản phẩm
        $updateStatus = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->update(['category_status' => 1]);
        dd($updateStatus);
        // Kiểm tra xem việc cập nhật có thành công hay không
        if ($updateStatus) {
            Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        } else {
            Session::put('message', 'Có lỗi xảy ra, không thể kích hoạt danh mục sản phẩm');
        }

        return redirect()->route('category.product.all');
    }

}
