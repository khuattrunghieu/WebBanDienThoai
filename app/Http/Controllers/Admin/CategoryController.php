<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Str;
use \DB;
use App\Models\Category;

class CategoryController extends Controller
{
  public function create()
  {
    return view('admin.category.create');
  }

  public function store(Request $request)
  {
    $category['name'] = $request->name;
    $category['status'] = $request->status;
    $category['created_at'] = now();
    $category['updated_at'] = now();
    $category['admin_id'] = \Auth::guard('admin')->user()->id;
    $category['slug'] = Str::slug($request->name);
    DB::table('categories')->insert($category);
    return redirect()->route('admin.category.index');
  }

  public function index()
  {
    $categorydata = Category::orderBy('id', 'DESC')->paginate(10);
    return view('admin.category.index', compact('categorydata'));
  }
  public function edit(id $id)
  {
    $category = DB::table('categories')->where('id', '=', $id)->first();
    return view('admin.category.edit', compact('category'));
  }
  public function update(Request $request, $id)
  {
    $category['name'] = $request->name;
    $category['status'] = $request->status;
    $category['updated_at'] = now();
    $category['admin_id'] = \Auth::guard('admin')->user()->id;
    $category['slug'] = Str::slug($request->name);
    DB::table('categories')->where('id', '=', $id)->update($category);
    return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công');
  }
  public function destroy($id)
  {
    $category = DB::table('categories')->where('id', '=', $id)->delete();
    return redirect()->route('admin.category.index')->with('success', 'Xóa thành công');
  }
  public function hidden($id)
  {
    $category['status'] = '0';
    DB::table('categories')->where('id', '=', $id)->update($category);
    return redirect()->route('admin.category.index')->with('success', 'Ẩn thành công');
  }
  public function undo($id)
  {
    $category['status'] = '1';
    DB::table('categories')->where('id', '=', $id)->update($category);
    return redirect()->route('admin.category.index')->with('success', 'Hiện thành công');
  }
}
