<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Trademark;
use App\Models\Color;
use App\Models\Product_Img;
use \DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $img_produc = Product_Img::orderBy('id', 'DESC')->paginate(10);
        $product = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trademark = Trademark::orderBy('id', 'DESC')->paginate(100);
        return view('admin.product.create', compact('trademark'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product['admin_id'] = \Auth::guard('admin')->user()->id;
        $product['name'] = $request->name;
        $product['slug'] = \Str::slug($request->name);
        $product['trademark'] = $request->trademark;                            // nhãn hiệu

        // màn hình
        $product['screen'] = $request->screen;
        
        // camera sau rear_camera
        $product['r_camera'] = $request->r_camera;

        // camera trước front_camera
        $product['f_camera'] = $request->f_camera;

        // Hệ điều hành & CPU
        $product['processor'] = $request->processor;                            // vi sử lý
        $product['cpu'] = $request->cpu;                                        // tốc độ cpu
        $product['gpu'] = $request->gpu;                                        // Vi xử lý đồ họa (GPU)	
        $product['operating_system'] = $request->operating_system;              // hệ điều hành

        // Bộ nhớ & Lưu trữ
        $product['ram'] = $request->ram;
        $product['rom'] = $request->rom;                                        //Bộ nhớ trong	

        // Kết nối
        $product['connect'] = $request->connect;


        // Pin & Sạc
        $product['battery_charger'] = $request->battery_charger;

        // Thông tin chung
        $product['general'] = $request->general;

        $product['created_at'] = now();
        $product['updated_at'] = now();
        DB::table('product')->insert($product);        
        return redirect()->route('admin.product.createImg');
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
        $trademark = Trademark::orderBy('id', 'DESC')->paginate(100);
        $product = DB::table('product')->where('id', '=', $id)->first();
        return view('admin.product.edit', compact('product','trademark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product['admin_id'] = \Auth::guard('admin')->user()->id;
        $product['name'] = $request->name;
        $product['slug'] = \Str::slug($request->name);
        $product['trademark'] = $request->trademark;                            // nhãn hiệu

        // màn hình
        $product['screen'] = $request->screen;
        
        // camera sau rear_camera
        $product['r_camera'] = $request->r_camera;

        // camera trước front_camera
        $product['f_camera'] = $request->f_camera;

        // Hệ điều hành & CPU
        $product['processor'] = $request->processor;                            // vi sử lý
        $product['cpu'] = $request->cpu;                                        // tốc độ cpu
        $product['gpu'] = $request->gpu;                                        // Vi xử lý đồ họa (GPU)	
        $product['operating_system'] = $request->operating_system;              // hệ điều hành

        // Bộ nhớ & Lưu trữ
        $product['ram'] = $request->ram;
        $product['rom'] = $request->rom;                                        //Bộ nhớ trong	

        // Kết nối
        $product['connect'] = $request->connect;


        // Pin & Sạc
        $product['battery_charger'] = $request->battery_charger;

        // Thông tin chung
        $product['general'] = $request->general;

        $product['updated_at'] = now();
        DB::table('product')->where('id', '=', $id)->update($product);
        return redirect()->route('admin.product.index');
    }
    public function hidden(string $id)
    {
        $product['status'] = '0';
        DB::table('product')->where('id', '=', $id)->update($product);
        return redirect()->route('admin.product.index')->with('success', 'Ẩn thành công');
    }
    public function undo(string $id)
    {
        $product['status'] = '1';
        DB::table('product')->where('id', '=', $id)->update($product);
        return redirect()->route('admin.product.index')->with('success', 'Hiện thành công');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('product')->where('id', '=', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Xóa thành công');
    }
    
    public function createImg(Request $request)
    {
        $product = Product::orderBy('id', 'DESC')->paginate(1);
        $color = Color::orderBy('id', 'DESC')->paginate(100);
        return view('admin.product.createImg' , compact('color','product'));
    }
    public function storeImg(Request $request, string $id)
    {
        // dd($request);
        $image = [
            'id_product' => $id,
            'created_at' => now(),
            'updated_at' => now(),
        ];           
        if($request->hasFile('image')){
            foreach ($request->id_color as $key => $id_color) {
                $image['id_color']=$id_color;
                $image['price']=$request->price[$key];
                $image['image'] = $request->file('image')[$key]->store('product');
                DB::table('img_product')->insert($image);
            }
            
        }
        return redirect()->route('admin.product.index')->with('success','Thêm mới ảnh thành công');
    }
    public function destroyImg(string $id)
    {
        DB::table('img_product')->where('id', '=', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Xóa thành công');
    }
    
    public function editImg(string $id)
    {
        // $product_img = Product_Img::orderBy('id', 'DESC')->paginate(100);
        $product_img = DB::table('img_product')->where('product_id', '=', $id)->get();
        
        return view('admin.product.editImg', compact('product_img'));
    }
    public function updateImg(Request $request, id $id)
    {

        $product = DB::table('img_product')->where('id_product', '=', $id)->first();
        $image = [
            'updated_at' => now(),
        ];           
        if($request->hasFile('image')){
            foreach ($request->id_color as $key => $id_color) {
                $image['id_color']=$id_color;
                $image['price']=$request->price[$key];
                $image['image'] = $request->file('image')[$key]->store('product');
                $file = $product->image;
                if($file && \Storage::exists($file)){
                    \Storage::delete($file);
                }
                DB::table('img_product')->where('id_product', '=', $id)->first()->update($image);
            }
        }
    }
    public function createDes(string $id)
    {
        $product = DB::table('product')->where('id', '=', $id)->first();
        return view('admin.product.createDes', compact('product'));
    }
    public function storeDes(Request $request, string $id)
    {
        $descriptions['admin_id'] = \Auth::guard('admin')->user()->id;
        $descriptions ['descriptions'] = $request->descriptions;
        $descriptions['updated_at'] = now();

        DB::table('product')->where('id', '=', $id)->update($descriptions);
        return redirect()->route('admin.product.index');
    }
    public function editDes(string $id)
    {   
        $product = DB::table('product')->where('id', '=', $id)->first();
        return view('admin.product.editDes' , compact('product'));
    }
    public function updateDes(Request $request, string $id)
    {
        $descriptions['admin_id'] = \Auth::guard('admin')->user()->id;
        $descriptions ['descriptions'] = $request->descriptions;
        $descriptions['updated_at'] = now();

        DB::table('product')->where('id', '=', $id)->update($descriptions);
        return redirect()->route('admin.product.index');
    }
}


