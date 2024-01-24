<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::orderBy('id', 'DESC')->paginate(10);
        return view('admin.admin.index' , compact('admin'));
    }

    public function profile()
    {
        $id = \Auth::guard('admin')->user()->id;
        $admin = \DB::table('admins')->where('id', '=', $id)->first();
        return view('admin.admin.profile' , compact('admin'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = \DB::table('admins')->where('id', '=', $id)->first();
        return view('admin.admin.edit' , compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin['name'] = $request->name;
        $admin['phone'] = $request->phone;
        $admin['avatar'] = $request->avatar;
        $admin['updated_at'] = now();
        \DB::table('admins')->where('id', '=', $id)->update($admin);
        return redirect()->route('admin.admin.index')->with('success','sửa thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \DB::table('admins')->where('id', '=', $id)->delete();
        return redirect()->route('admin.admin.index')->with('success', 'Xóa thành công');
    }
    public function hidden($id)
    {
        $admin['status'] = '0';
        \DB::table('admins')->where('id', '=', $id)->update($admin);
        return redirect()->route('admin.admin.index')->with('success', 'Ẩn thành công');
    }
    public function undo($id)
    {
        $admin['status'] = '1';
       \DB::table('admins')->where('id', '=', $id)->update($admin);
        return redirect()->route('admin.admin.index')->with('success', 'Hiện thành công');
    }
    public function change(string $id)
    {
        return view('admin.admin.changePassword'); 
    }
    public function changepass(Request $request, string $id)
    {
        $admin['password'] = \Hash::make($request->password);
        $admin['updated_at'] = now();
        \DB::table('admins')->where('id', '=', $id)->update($admin);
        return redirect()->route('admin.admin.index')->with('success','Đổi mật khẩu thành công');
    }
}
