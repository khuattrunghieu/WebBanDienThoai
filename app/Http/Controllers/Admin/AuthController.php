<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use \Hash;
use \Auth;
class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function pLogin(Request $request)
    {

        $login = $request->only('email', 'password');
        if(! Auth::guard('admin')->attempt($login)) {
            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu.');
        }
        return redirect()->route('admin.welcome')->with('success','Đăng nhập thành công');
    }

    public function home(Admin $admin)
    {
        return view('admin.welcome');
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register()
    {
        return view('admin.auth.register');
    }
     public function pRegister(Request $request)
    {
        
        $admin['name'] = $request->name;
        $admin['email'] = $request->email;
        $admin['password'] = Hash::make($request->password);
        $admin['created_at'] = now();
        $admin['updated_at'] = now();
        \DB::table('admins')->insert($admin);
        return redirect()->route('admin.auth.login')->with('success','Thêm mới thành công');
    }
}


