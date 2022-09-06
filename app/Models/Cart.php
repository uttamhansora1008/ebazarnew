<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable =[
      'user_id',
      'product_id',
      'quantity',
      'size',
    ];
    protected $hidden=[
      'updated_at',
      'created_at',
      ];
      public function image()
      {
          return $this->hasOne(Image::class,'product_id');
      }
}
