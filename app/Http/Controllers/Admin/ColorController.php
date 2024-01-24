<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Str;
use \DB;
use App\Models\Color;

class ColorController extends Controller
{
    public function create()
    {
      return view('admin.color.create');
    }
  
    public function store(Request $request)
    {
      $color['name'] = $request->name;
      $color['status'] = $request->status;
      $color['created_at'] = now();
      $color['updated_at'] = now();
      $color['slug'] = Str::slug($request->name);
      DB::table('color')->insert($color);
      return redirect()->route('admin.color.index');
    }
  
    public function index()
    {
      $colordata = color::orderBy('id', 'DESC')->paginate(10);
      return view('admin.color.index', compact('colordata'));
    }
    public function edit($id)
    {
      $color = DB::table('color')->where('id', '=', $id)->first();
      return view('admin.color.edit', compact('color'));
    }
    public function update(Request $request, $id)
    {
      $color['name'] = $request->name;
      $color['status'] = $request->status;
      $color['updated_at'] = now();
      // $color['admin_id'] = \Auth::guard('admin')->user()->id;
      $color['slug'] = Str::slug($request->name);
      DB::table('color')->where('id', '=', $id)->update($color);
      return redirect()->route('admin.color.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
      $color = DB::table('color')->where('id', '=', $id)->delete();
      return redirect()->route('admin.color.index')->with('success', 'Xóa thành công');
    }
    public function hidden($id)
    {
      $color['status'] = '0';
      DB::table('color')->where('id', '=', $id)->update($color);
      return redirect()->route('admin.color.index')->with('success', 'Ẩn thành công');
    }
    public function undo($id)
    {
      $color['status'] = '1';
      DB::table('color')->where('id', '=', $id)->update($color);
      return redirect()->route('admin.color.index')->with('success', 'Hiện thành công');
    }
  }