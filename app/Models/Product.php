<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';


    protected $fillables = [

        'id',
        'admin_id',
        'km_id',
        'dm_id',
        'name',
        'slug',
        'trademark_id',                     // nhãn hiệu

    // màn hình
        'screen',

    // camera sau rear_camera
        'r_camera',

    // camera trước front_camera
        'f_camera',
    // Hệ điều hành & CPU
        'processor',                    // vi sử lý
        'cpu',                          // tốc độ cpu
        'gpu',                          // Vi xử lý đồ họa (GPU)	
        'operating_system',             // hệ điều hành

    // Bộ nhớ & Lưu trữ
        'ram',
        'rom',                          //Bộ nhớ trong	

    // Kết nối
        'connect',

    // Pin & Sạc
        'battery_charger',
    // Thông tin chung
        'general',
    ];
    public function product_img(){
        return $this->hasMany(Product_Img::class, 'product_id', 'color_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function trademark(){
        return $this->hasMany(Trademark::class, 'id');
    }
    
}
