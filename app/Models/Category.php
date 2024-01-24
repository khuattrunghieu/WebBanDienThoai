<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillables = [
        'status',	
        'name',	
        'admin_id',
        'slug'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
