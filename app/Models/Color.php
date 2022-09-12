<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'product_id',
        'color',
    ];
    protected $hidden=[
      'created_at',
      'updated_at',
    ];
    public function images()
{
    return $this->belongsTo(Product::class,'subcategory_id');
}

}

