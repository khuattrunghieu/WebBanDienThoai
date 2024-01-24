<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Img extends Model
{
    use HasFactory;

    protected $table = 'img_product';
    protected $fillables = [
        'product_id',	
        'color_id',	
        'image',
        'price'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}