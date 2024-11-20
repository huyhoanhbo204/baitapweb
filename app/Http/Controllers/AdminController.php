<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Termwind\Components\Raw;

class AdminController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->send();
        }
    }


    // Trang đăng nhập admin
    public function index()
    {
        if (Session::has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view("admin_login");
    }

    // Trang dashboard admin
    public function dashboard()
    {
        $this->AuthLogin();
        return view("pages.admin.dashboard");
    }


    public function login(Request $request)
    {

        $admin_email = trim($request->input('admin_email'));
        $admin_password = trim($request->input('admin_password'));


        // dd($admin_email, $admin_password);


        $query = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password);


        // dd($query->toSql());


        // dd($query->toSql(), $query->getBindings());


        $result = $query->first();


        // dd($result);

        if ($result) {
            // Lưu thông tin vào session nếu đăng nhập thành công
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect()->route('admin.dashboard');
        } else {
            // Sai thông tin đăng nhập, trả về thông báo
            Session::put('message', 'Mật khẩu hoặc email không đúng, nhập lại nhé');
            return redirect()->route('admin.login');
        }
    }

    //Xử lý đăng xuất
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect()->route('admin.login');
    }
}
