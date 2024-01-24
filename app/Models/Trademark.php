<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    use HasFactory;

    protected $table = 'trademark';
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
