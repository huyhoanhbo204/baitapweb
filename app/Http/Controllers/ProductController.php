<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if (!$admin_id) {
            return redirect()->route('admin');
        }
    }

    // Hiển thị danh sách sản phẩm
    public function all_product()
    {
        $this->AuthLogin(); // Kiểm tra quyền đăng nhập
        $all_product = Product::join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand.brand_name')
            ->get();

        return view('pages.admin.product.all_product', compact('all_product'));
    }

    // Hiển thị form thêm sản phẩm
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')
            ->orderby('category_id', 'desc')
            ->get();
        $brand_product = DB::table('tbl_brand')
            ->orderby('brand_id', 'desc')
            ->get();

        return view('pages.admin.product.add_product')->with([
            'cate_product' => $cate_product,
            'brand_product' => $brand_product
        ]);
    }

    // Lưu sản phẩm mới
    public function save_product(Request $request)
    {

        $this->AuthLogin(); // Kiểm tra quyền đăng nhập
        // Validation đầu vào
        $request->validate([
            'product_name' => 'required|min:10',
            'product_slug' => 'required',
            'product_price' => 'required|numeric',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_desc' => 'required',
            'product_content' => 'required',
            'product_cate' => 'required|exists:tbl_category_product,category_id',
            'product_brand' => 'required|exists:tbl_brand,brand_id',
            'product_status' => 'required|in:0,1',
        ]);

        // Gán dữ liệu từ form vào mảng $data
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image)); // Lấy tên ảnh (không bao gồm phần mở rộng)
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); // Tạo tên mới cho ảnh
            $get_image->move(public_path('uploads/product'), $new_image); // Di chuyển ảnh vào thư mục uploads/product
            $data['product_image'] = 'uploads/product/' . $new_image;
        } else {

            $data['product_image'] = '';
        }
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return redirect()->route('product.all');
    }

    public function unactiveProduct($product_id)
    {
        $this->AuthLogin(); // Kiểm tra quyền đăng nhập

        // Cập nhật trạng thái sản phẩm
        DB::table('tbl_product')->where('product_id', $product_id)
            ->update(['product_status' => 0]); // Cập nhật trạng thái thành không kích hoạt (0)

        // Thông báo và chuyển hướng
        Session::put('message', 'Kích hoạt sản phẩm thành công');
        return redirect()->route('product.all');
    }

    public function activeProduct($product_id)
    {
        $this->AuthLogin(); // Kiểm tra quyền đăng nhập

        // Cập nhật trạng thái sản phẩm
        DB::table('tbl_product')->where('product_id', $product_id)
            ->update(['product_status' => 1]); // Cập nhật trạng thái thành kích hoạt (1)

        // Thông báo và chuyển hướng
        Session::put('message', 'Không kích hoạt sản phẩm thành công');
        return redirect()->route('product.all');
    }


}
