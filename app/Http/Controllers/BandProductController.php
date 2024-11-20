<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Brand;

class BandProductController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if (!$admin_id) {
            return redirect()->route('admin');
        }
    }


    public function add_brand_product()
    {
        $this->AuthLogin();
        return view('pages.admin.brand.add_brand_product');
    }


    public function all_brand_product()
    {
        $this->AuthLogin();
        $all_brand_product = Brand::orderBy('brand_id', 'DESC')->get();
        return view('pages.admin.brand.all_brand_product', compact('all_brand_product'));
    }


    public function save_brand_product(Request $request)
    {
        $this->AuthLogin();


        $data = $request->all();


        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();


        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return redirect()->route('brand.product.all');
    }


    public function unactive_brand_product($brand_product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status' => 1]);

        Session::put('message', 'Không kích hoạt thương hiệu sản phẩm thành công');
        return redirect()->route('brand.product.all');
    }

    public function active_brand_product($brand_product_id)
    {
        $this->AuthLogin();


        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status' => 0]);

        Session::put('message', 'Kích hoạt thương hiệu sản phẩm thành công');
        return redirect()->route('brand.product.all');
    }

    public function edit_brand_product($brand_id)
    {
        $this->AuthLogin();
        $edit_brand_product = Brand::where('brand_id', $brand_id)->get();
        return view('pages.admin.brand.edit_brand_product', compact('edit_brand_product'));
    }


    public function update_brand_product(Request $request, $brand_id)
    {
        $this->AuthLogin();


        $data = $request->all();


        $brand = Brand::find($brand_id);


        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_product_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];


        $brand->save();


        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');

        return redirect()->route('brand.product.all');
    }


    public function delete_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->delete();
        Session::put('message', 'Xóa thương hiệu sản phẩm thành công');
        return redirect()->route('brand.product.all');
    }

}
