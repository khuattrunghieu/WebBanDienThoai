<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Str;
use \DB;
use App\Models\Trademark;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trademarkdata = trademark::orderBy('id', 'DESC')->paginate(10);
        return view('admin.trademark.index', compact('trademarkdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trademark.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $trademark['name'] = $request->name;
        $trademark['status'] = $request->status;
        $trademark['created_at'] = now();
        $trademark['updated_at'] = now();
        $trademark['admin_id'] = \Auth::guard('admin')->user()->id;
        $trademark['slug'] = Str::slug($request->name);
        DB::table('trademark')->insert($trademark);
        return redirect()->route('admin.trademark.index');
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
    public function edit($id)
    {
        $trademark = DB::table('trademark')->where('id', '=', $id)->first();
        return view('admin.trademark.edit', compact('trademark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $trademark['name'] = $request->name;
        $trademark['status'] = $request->status;
        $trademark['updated_at'] = now();
        $trademark['admin_id'] = \Auth::guard('admin')->user()->id;
        $trademark['slug'] = Str::slug($request->name);
        DB::table('trademark')->where('id', '=', $id)->update($trademark);
        return redirect()->route('admin.trademark.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('trademark')->where('id', '=', $id)->delete();
        return redirect()->route('admin.trademark.index')->with('success', 'Xóa thành công');
    }

    public function hidden($id)
    {
        $trademark['status'] = '0';
        DB::table('trademark')->where('id', '=', $id)->update($trademark);
        return redirect()->route('admin.trademark.index')->with('success', 'Ẩn thành công');
    }
    public function undo($id)
    {
        $trademark['status'] = '1';
        DB::table('trademark')->where('id', '=', $id)->update($trademark);
        return redirect()->route('admin.trademark.index')->with('success', 'Hiện thành công');
    }
}

